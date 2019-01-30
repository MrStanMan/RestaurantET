<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ContactFormRequest;
use App\Http\Requests;
use App\Mail\ContactEmail;

class ContactController extends Controller {

    public function create()
    {
        return view('pages.contact');
    }

      public function store(Request $request)
	{

		$contact = [];

		$contact['name'] = $request->get('contactname');
		$contact['email'] = $request->get('contactemail');
		$contact['msg'] = $request->get('contactmessage');

		Mail::to(config('mail.from.address'))->send(new ContactEmail($contact));

		return redirect()->route('contact');
	}
}