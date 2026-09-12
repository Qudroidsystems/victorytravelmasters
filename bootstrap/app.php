<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Session\TokenMismatchException;
use Illuminate\Support\Facades\Auth;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',  
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'role' => \Spatie\Permission\Middleware\RoleMiddleware::class,
            'permission' => \Spatie\Permission\Middleware\PermissionMiddleware::class,
            'role_or_permission' => \Spatie\Permission\Middleware\RoleOrPermissionMiddleware::class,
            // Device authentication
            'device.auth' => \App\Http\Middleware\DeviceAuthMiddleware::class,
        ]);

        $middleware->validateCsrfTokens(except: [
            'cbt/submit',
            'webhook/*',
            'payment/callback',
        ]);

        // ============================================
        // REPLACE THE DEFAULT CSRF MIDDLEWARE WITH CUSTOM ONE
        // ============================================
        $middleware->replace(
            \Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class,
            \App\Http\Middleware\CustomVerifyCsrfToken::class
        );
    })
    ->withExceptions(function (Exceptions $exceptions) {
        // Fallback handler for any other TokenMismatchException
        $exceptions->render(function (TokenMismatchException $e, $request) {
            $intendedUrl = $request->fullUrl();

            if ($request->expectsJson()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Session expired. Please login again.',
                    'redirect' => route('login', [], false)
                ], 419);
            }

            if (Auth::check()) {
                Auth::logout();
            }

            $request->session()->flush();
            $request->session()->regenerate();

            return redirect()->route('login')
                ->with('session_expired', true)
                ->with('error', 'Your session has expired. Please login again.')
                ->with('intended', $intendedUrl);
        });
    })->create();