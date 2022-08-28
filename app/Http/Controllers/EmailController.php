<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class EmailController extends Controller
{
    public function create()
    {
        return view('email');
    }

    public function sendEmail(Request $request)
    {
        $request->validate([
          'name' => 'required|name',
          'last_name' => 'required|last_name',
          'email' => 'required',
          'phone' => 'required',
          'message' => 'required',
        ]);

        $data = [
          'name' => $request->name,
          'last_name' => $request->last_name,
          'email' => $request->email,
          'phone' => $request->phone,
          'message' => $request->message
        ];

        Mail::send('email-template', $data, function($message) use ($data) {
          $message->to($data['email'])
          ->message($data['message']);
        });

        return back()->with(['message' => 'Email successfully sent!']);
    }
}