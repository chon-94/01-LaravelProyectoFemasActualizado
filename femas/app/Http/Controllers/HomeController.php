<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;

class HomeController extends Controller
{
    public function index()
    {
        $projects = Project::where('is_active', true)
                          ->latest()
                          ->take(6)
                          ->get();

        return view('home', compact('projects'));
    }

    public function about()
    {
        return view('about');
    }

    public function contact(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|min:10',
        ]);

        // Enviar email (si configuraste MAIL_MAILER=log, solo lo registra)
        try {
            Mail::to('fema@femaingenieros.com')->send(new ContactFormMail($validated));
        } catch (\Exception $e) {
            // Si falla el mail, solo registra el intento
            \Log::info('Contact form submitted:', $validated);
        }

        return back()->with('success', '✅ Mensaje enviado. Te contactaremos pronto.');
    }
}