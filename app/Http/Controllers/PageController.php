<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return view('guest.welcome');
    }

    public function about()
    {
        return view('guest.about');
    }

    public function contacts()
    {
        return view('guest.contacts');
    }
    
    public function sendContactForm(Request $request)
    {
        $validatedData = $request->validate([
            "full_name" => "required",
            "email" => "required |email",
            "message" => "required",
        ]);

        // ddd($validatedData);

        // return (new ContactFormMail($validatedData))->render();

        Mail::to('admin@admin.com')->send(new ContactFormMail($validatedData));
        return redirect()->route('contacts')->with('message', 'Thanks for your e-mail! We will get in touch within 48H.');
    }
}
