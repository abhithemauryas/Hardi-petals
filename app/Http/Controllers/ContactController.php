<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
   public function store(Request $request)
{
    $validated = $request->validate([
        'Name' => 'required',
        'Email' => 'required|email',
        'Phone' => 'nullable',
        'Subject' => 'nullable',
        'Message' => 'required'
    ]);

    \App\Models\Contact::create([
        'name' => $request->Name,
        'email' => $request->Email,
        'phone' => $request->Phone,
        'subject' => $request->Subject,
        'message' => $request->Message,
    ]);

    return response()->json([
        'status' => true,
        'message' => "Message sent successfully!"
    ]);
}

}
