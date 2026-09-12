<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Track which seeders have been run.
     */
    protected array $runSeeders = [];

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Load already run seeders from the database
        $this->loadRunSeeders();

        // Start timing
        $startTime = microtime(true);

        $seededCount = 0;
        $failedCount = 0;
        $skippedCount = 0;

        $this->command->info('');
        $this->command->info(
            '╔═══════════════════════════════════════════════════════════════════════════════╗'
        );
        $this->command->info(
            '║                         🚀 DATABASE SEEDING PROCESS                          ║'
        );
        $this->command->info(
            '║                         Starting at: ' . now()->format('Y-m-d H:i:s') . '                         ║'
        );
        $this->command->info(
            '╚═══════════════════════════════════════════════════════════════════════════════╝'
        );
        $this->command->info('');

        // ============================================================
        // CORE PERMISSIONS & FOUNDATION
        // ============================================================

        $this->printSection(
            '🔐 CORE PERMISSIONS & FOUNDATION'
        );

        $result = $this->safeCall(
            PermissionTableSeeder::class,
            'PermissionTableSeeder',
            '🔐 Seeding permission tables...'
        );
        $this->updateStats(
            $result,
            $seededCount,
            $failedCount,
            $skippedCount
        );

        $result = $this->safeCall(
            UserTableSeeder::class,
            'UserTableSeeder',
            '👤 Seeding user data...'
        );
        $this->updateStats(
            $result,
            $seededCount,
            $failedCount,
            $skippedCount
        );

        $this->command->info('');

        // ============================================================
        // DATABASE STATISTICS
        // ============================================================

        $this->command->info('');

        $this->printSection(
            '📊 DATABASE STATISTICS'
        );

        $this->showDatabaseStats();

        // ============================================================
        // COMPLETION SUMMARY
        // ============================================================

        $endTime = microtime(true);

        $executionTime = round(
            $endTime - $startTime,
            2
        );

        $this->command->info('');

        $this->command->info(
            '╔═══════════════════════════════════════════════════════════════════════════════╗'
        );

        $this->command->info(
            '║                         ✅ SEEDING COMPLETED                                 ║'
        );

        $this->command->info(
            '╠═══════════════════════════════════════════════════════════════════════════════╣'
        );

        $this->command->info(
            '║  📊 Total Seeders Executed: ' .
            str_pad(
                $seededCount,
                45,
                ' ',
                STR_PAD_RIGHT
            ) .
            '║'
        );

        $this->command->info(
            '║  ⏭️  Seeders Skipped: ' .
            str_pad(
                $skippedCount,
                49,
                ' ',
                STR_PAD_RIGHT
            ) .
            '║'
        );

        $this->command->info(
            '║  ❌ Failed Seeders: ' .
            str_pad(
                $failedCount,
                49,
                ' ',
                STR_PAD_RIGHT
            ) .
            '║'
        );

        $this->command->info(
            '║  ⏱️  Execution Time: ' .
            str_pad(
                $executionTime . ' seconds',
                45,
                ' ',
                STR_PAD_RIGHT
            ) .
            '║'
        );

        $this->command->info(
            '║  🕐 Completed at: ' .
            str_pad(
                now()->format('Y-m-d H:i:s'),
                45,
                ' ',
                STR_PAD_RIGHT
            ) .
            '║'
        );

        $this->command->info(
            '╚═══════════════════════════════════════════════════════════════════════════════╝'
        );

        $this->command->info('');

        if ($failedCount > 0) {

            $this->command->warn(
                '⚠️  Some seeders failed. Please check the errors above.'
            );

            $this->command->warn(
                '💡 Tip: Run "php artisan db:seed --force" to force seed in production.'
            );

        } else {

            $this->command->info(
                '🎉 Database seeding completed successfully!'
            );

            $this->command->info(
                '💡 You can now run "php artisan serve" to start the application.'
            );

            $this->command->info(
                '💡 Default admin credentials: admin@example.com / password'
            );
        }
    }

    // ================================================================
    // HELPER: PRINT SECTION
    // ================================================================

    protected function printSection(string $title): void
    {
        $this->command->info(
            '┌─────────────────────────────────────────────────────────────────────────────┐'
        );

        $this->command->info(
            '│ ' . str_pad(
                $title,
                75,
                ' ',
                STR_PAD_RIGHT
            ) . '│'
        );

        $this->command->info(
            '└─────────────────────────────────────────────────────────────────────────────┘'
        );

        $this->command->info('');
    }

    // ================================================================
    // LOAD PREVIOUSLY RUN SEEDERS
    // ================================================================

    protected function loadRunSeeders(): void
    {
        $this->runSeeders = [];

        /*
         * Check if seeder_log table exists.
         */
        if (!Schema::hasTable('seeder_log')) {

            $this->createSeederLogTable();

            return;
        }

        try {

            $this->runSeeders = DB::table('seeder_log')
                ->whereNotNull('completed_at')
                ->where('success', true)
                ->pluck('seeder_name')
                ->toArray();

        } catch (\Throwable $e) {

            Log::warning(
                'Could not load seeder log: ' .
                $e->getMessage()
            );
        }
    }

    // ================================================================
    // CREATE SEEDER LOG TABLE
    // ================================================================

    protected function createSeederLogTable(): void
    {
        try {

            Schema::create(
                'seeder_log',
                function ($table) {

                    $table->id();

                    $table->string(
                        'seeder_name'
                    )->unique();

                    $table->timestamp(
                        'started_at'
                    )->nullable();

                    $table->timestamp(
                        'completed_at'
                    )->nullable();

                    $table->boolean(
                        'success'
                    )->default(false);

                    $table->text(
                        'error_message'
                    )->nullable();

                    $table->timestamps();
                }
            );

        } catch (\Throwable $e) {

            Log::warning(
                'Could not create seeder_log table: ' .
                $e->getMessage()
            );
        }
    }

    // ================================================================
    // NORMALIZE SEEDER CLASS
    // ================================================================

    protected function resolveSeederClass($seeder): string
    {
        /*
         * If a class is already fully qualified,
         * leave it alone.
         *
         * Example:
         * Database\Seeders\PermissionTableSeeder
         */
        if (
            is_string($seeder) &&
            str_contains($seeder, '\\')
        ) {
            return $seeder;
        }

        /*
         * Convert:
         *
         * PermissionTableSeeder
         *
         * to:
         *
         * Database\Seeders\PermissionTableSeeder
         */
        return __NAMESPACE__ . '\\' . $seeder;
    }

    // ================================================================
    // CHECK IF SEEDER ALREADY RAN
    // ================================================================

    protected function hasBeenRun(string $seederName): bool
    {
        $seederClass = $this->resolveSeederClass(
            $seederName
        );

        /*
         * Canonical fully-qualified name.
         */
        if (
            in_array(
                $seederClass,
                $this->runSeeders,
                true
            )
        ) {
            return true;
        }

        /*
         * Backward compatibility:
         *
         * Old logs may contain:
         *
         * PermissionTableSeeder
         */
        $shortName = class_basename(
            $seederClass
        );

        return in_array(
            $shortName,
            $this->runSeeders,
            true
        );
    }

    // ================================================================
    // LOG SEEDER EXECUTION
    // ================================================================

    protected function logSeederRun(
        string $seederName,
        bool $success,
        ?string $error = null
    ): void {

        try {

            /*
             * Always store the fully qualified class name.
             */
            $seederClass = $this->resolveSeederClass(
                $seederName
            );

            DB::table('seeder_log')->updateOrInsert(
                [
                    'seeder_name' => $seederClass,
                ],
                [
                    'seeder_name' => $seederClass,

                    'started_at' => now(),

                    'completed_at' => $success
                        ? now()
                        : null,

                    'success' => $success,

                    'error_message' => $error,

                    'updated_at' => now(),
                ]
            );

            /*
             * Update in-memory list immediately.
             */
            if (
                $success &&
                !in_array(
                    $seederClass,
                    $this->runSeeders,
                    true
                )
            ) {

                $this->runSeeders[] =
                    $seederClass;
            }

        } catch (\Throwable $e) {

            /*
             * Logging should NEVER break database seeding.
             */
            Log::warning(
                'Could not log seeder run',
                [
                    'seeder' => $seederName,
                    'error' => $e->getMessage(),
                ]
            );
        }
    }

    // ================================================================
    // UPDATE STATISTICS
    // ================================================================

    protected function updateStats(
        array $result,
        int &$seededCount,
        int &$failedCount,
        int &$skippedCount
    ): void {

        if (
            isset($result['skipped']) &&
            $result['skipped'] === true
        ) {

            $skippedCount++;

        } elseif (
            isset($result['success']) &&
            $result['success'] === true
        ) {

            $seededCount++;

        } else {

            $failedCount++;
        }
    }

    // ================================================================
    // CHECK PERMISSION
    // ================================================================

    protected function permissionExists(
        string $permissionName,
        string $guardName = 'web'
    ): bool {

        return Permission::where(
            'name',
            $permissionName
        )
            ->where(
                'guard_name',
                $guardName
            )
            ->exists();
    }

    // ================================================================
    // CREATE PERMISSION IF NOT EXISTS
    // ================================================================

    protected function createPermissionIfNotExists(
        string $permissionName,
        string $guardName = 'web',
        ?string $title = null
    ): bool {

        if (
            $this->permissionExists(
                $permissionName,
                $guardName
            )
        ) {
            return false;
        }

        $data = [
            'name' => $permissionName,
            'guard_name' => $guardName,
        ];

        if ($title !== null) {
            $data['title'] = $title;
        }

        Permission::create($data);

        return true;
    }

    // ================================================================
    // SAFE SEEDER CALL
    // ================================================================

    protected function safeCall(
        $seeder,
        $name,
        $message = null
    ): array {

        if ($message) {

            $this->command
                ->getOutput()
                ->write($message);
        }

        /*
         * Resolve:
         *
         * PermissionTableSeeder
         *
         * into:
         *
         * Database\Seeders\PermissionTableSeeder
         */
        $seederClass = $this->resolveSeederClass(
            $seeder
        );

        /*
         * Check whether the class exists.
         */
        if (!class_exists($seederClass)) {

            if ($message) {
                $this->command
                    ->getOutput()
                    ->write("\r\033[K");
            }

            $this->command->warn(
                "  ⚠️  Seeder not found: {$name} - skipping"
            );

            return [
                'success' => false,
                'skipped' => true,
            ];
        }

        /*
         * Check whether this seeder has already run.
         */
        if (
            $this->hasBeenRun(
                $seederClass
            )
        ) {

            if ($message) {
                $this->command
                    ->getOutput()
                    ->write("\r\033[K");
            }

            $this->command->info(
                "  ⏭️  {$name} already run - skipping"
            );

            return [
                'success' => true,
                'skipped' => true,
            ];
        }

        /*
         * Execute the seeder.
         */
        try {

            $this->call(
                $seederClass
            );

            /*
             * Log successful execution.
             */
            $this->logSeederRun(
                $seederClass,
                true
            );

            if ($message) {

                $this->command
                    ->getOutput()
                    ->write("\r\033[K");

                $this->command->info(
                    "  ✅ {$name} completed successfully!"
                );
            }

            return [
                'success' => true,
                'skipped' => false,
            ];

        } catch (\Throwable $e) {

            /*
             * Handle duplicate permission situations.
             */
            $errorMessage = $e->getMessage();

            $isDuplicateError =
                str_contains(
                    $errorMessage,
                    'PermissionAlreadyExists'
                )
                ||
                str_contains(
                    strtolower($errorMessage),
                    'already exists'
                )
                ||
                str_contains(
                    strtolower($errorMessage),
                    'duplicate entry'
                );

            if ($isDuplicateError) {

                if ($message) {

                    $this->command
                        ->getOutput()
                        ->write("\r\033[K");

                    $this->command->warn(
                        "  ⚠️  {$name} - some records already exist, continuing"
                    );
                }

                /*
                 * Treat duplicate data as successfully handled.
                 */
                $this->logSeederRun(
                    $seederClass,
                    true,
                    'Some permissions or records already existed'
                );

                return [
                    'success' => true,
                    'skipped' => false,
                ];
            }

            /*
             * Real failure.
             */
            if ($message) {

                $this->command
                    ->getOutput()
                    ->write("\r\033[K");

                $this->command->error(
                    "  ❌ {$name} failed: " .
                    $errorMessage
                );
            }

            Log::error(
                "Seeder failed: {$seederClass}",
                [
                    'seeder' => $seederClass,
                    'error' => $errorMessage,
                    'file' => $e->getFile(),
                    'line' => $e->getLine(),
                ]
            );

            $this->logSeederRun(
                $seederClass,
                false,
                $errorMessage
            );

            return [
                'success' => false,
                'skipped' => false,
            ];
        }
    }

    // ================================================================
    // DATABASE STATISTICS
    // ================================================================

    protected function showDatabaseStats(): void
    {
        $tables = [

            'users' =>
                '👤 Users',

            'permissions' =>
                '🔐 Permissions',

            'roles' =>
                '👥 Roles',
        ];

        $stats = [];

        foreach ($tables as $table => $label) {

            if (!Schema::hasTable($table)) {
                continue;
            }

            try {

                $count = DB::table(
                    $table
                )->count();

                if ($count > 0) {

                    $stats[] =
                        "  {$label}: " .
                        number_format($count);
                }

            } catch (\Throwable $e) {

                /*
                 * Ignore inaccessible/missing tables.
                 */
            }
        }

        if (count($stats) > 0) {

            $this->command->info(
                implode("\n", $stats)
            );

        } else {

            $this->command->info(
                '  ℹ️  No data found in tables yet.'
            );
        }
    }
}
