<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Mail\ContactFormMarkdown;
use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function form()
    {
        return view('guest.contacts');
    }

    public function storeAndSend(Request $request)
    {
        $validatedData = $request->validate([
            "full_name" => "required",
            "email" => "required |email",
            "message" => "required",
        ]);
        $contact = Contact::create($validatedData);

        #View without sending.
        // return (new ContactFormMarkdown($contact))->render();

        Mail::to('admin@admin.com')->send(new ContactFormMail($validatedData));
        return redirect()->route('contacts')->with('message', 'Thanks for your e-mail! We will get in touch within 48H.');
    }
}
