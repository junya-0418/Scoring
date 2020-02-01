<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\Contacted;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function input() {

        return view('contact');

    }

    public function send(ContactRequest $request) {

        $params = [
          'name' => $request->name,
          'mailAddress' => $request->mailAddress,
          'body' => $request->body
        ];

        Mail::to('alegoal.jp@gmail.com')->send(new Contacted($params));

        return view('contact_complete');

    }
}
