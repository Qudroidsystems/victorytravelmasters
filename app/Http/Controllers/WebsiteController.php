<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

/**
 * Public website pages for Victory Journey Masters.
 * All page content comes from config/site.php.
 */
class WebsiteController extends Controller
{
    public function about()
    {
        return view('web.pages.about');
    }

    public function services()
    {
        return view('web.pages.services', ['services' => config('site.services')]);
    }

    public function service(string $slug)
    {
        return view('web.pages.service-detail', [
            'service'  => $this->findBySlug('site.services', $slug),
            'services' => config('site.services'),
        ]);
    }

    public function destinations()
    {
        return view('web.pages.destinations', ['destinations' => config('site.destinations')]);
    }

    public function destination(string $slug)
    {
        $destination = $this->findBySlug('site.destinations', $slug);

        $tours = collect(config('site.tours'))
            ->where('destination', $destination['name'])
            ->values()
            ->all();

        return view('web.pages.destination-detail', [
            'destination'  => $destination,
            'destinations' => config('site.destinations'),
            'tours'        => $tours,
        ]);
    }

    public function tours()
    {
        return view('web.pages.tours', ['tours' => config('site.tours')]);
    }

    public function tour(string $slug)
    {
        return view('web.pages.tour-detail', [
            'tour'  => $this->findBySlug('site.tours', $slug),
            'tours' => config('site.tours'),
        ]);
    }

    public function faq()
    {
        return view('web.pages.faq', ['groups' => config('site.faqs')]);
    }

    public function gallery()
    {
        return view('web.pages.gallery', ['images' => config('site.gallery')]);
    }

    public function testimonials()
    {
        return view('web.pages.testimonials', ['testimonials' => config('site.testimonials')]);
    }

    public function blog()
    {
        return view('web.pages.blog', ['posts' => config('site.posts')]);
    }

    public function post(string $slug)
    {
        return view('web.pages.blog-detail', [
            'post'  => $this->findBySlug('site.posts', $slug),
            'posts' => config('site.posts'),
        ]);
    }

    public function contact()
    {
        return view('web.pages.contact', ['services' => config('site.services')]);
    }

    public function sendContact(Request $request)
    {
        // Simple honeypot: real visitors never fill this hidden field.
        if ($request->filled('website')) {
            return back()->with('contact_success', 'Thank you! Your message has been received.');
        }

        $data = $request->validate([
            'name'        => ['required', 'string', 'max:120'],
            'email'       => ['required', 'email', 'max:150'],
            'phone'       => ['required', 'string', 'max:40'],
            'service'     => ['nullable', 'string', 'max:120'],
            'destination' => ['nullable', 'string', 'max:120'],
            'travel_date' => ['nullable', 'date'],
            'travellers'  => ['nullable', 'integer', 'min:1', 'max:200'],
            'message'     => ['required', 'string', 'max:5000'],
        ]);

        $lines = [
            'New enquiry from the Victory Journey Masters website',
            str_repeat('-', 50),
            'Name: '        . $data['name'],
            'Email: '       . $data['email'],
            'Phone: '       . $data['phone'],
            'Service: '     . ($data['service'] ?? '-'),
            'Destination: ' . ($data['destination'] ?? '-'),
            'Travel date: ' . ($data['travel_date'] ?? '-'),
            'Travellers: '  . ($data['travellers'] ?? '-'),
            '',
            'Message:',
            $data['message'],
        ];

        Log::info('Website enquiry', $data);

        try {
            Mail::raw(implode("\n", $lines), function ($mail) use ($data) {
                $mail->to(config('site.email'))
                    ->replyTo($data['email'], $data['name'])
                    ->subject('Website enquiry: ' . $data['name']);
            });
        } catch (\Throwable $e) {
            Log::error('Website enquiry email failed: ' . $e->getMessage());
        }

        return back()->with(
            'contact_success',
            'Thank you, ' . $data['name'] . '! Your message has been received. A member of our team will contact you shortly.'
        );
    }

    /**
     * Find an item in a config list by its slug or show the 404 page.
     */
    private function findBySlug(string $key, string $slug): array
    {
        $item = collect(config($key))->firstWhere('slug', $slug);

        abort_if(! $item, 404);

        return $item;
    }
}
