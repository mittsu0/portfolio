<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class ContactController extends Controller
{
    public function create()
    {
        return view('contacts.create');
    }

    public function confirm(ContactRequest $request)
    {
        $data = $request->only(['email', 'title', 'content']);
        return view('contacts.confirm', compact('data'));
    }

    public function complete(ContactRequest $request)
    {
        if ($request->has('back')) {
            return redirect()->route('contacts.create')->withInput();
        }
        $data = $request->only(['email', 'title', 'content']);
        Mail::to($data['email'])->send(new ContactMail($data));
        $request->session()->regenerateToken();
        return view('contacts.complete');
    }
}
