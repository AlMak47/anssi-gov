<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Contact;

class ContactController extends Controller
{
    //

    public function getForm() {
    	return view('contact-us');
    }

    public function getIncidentForm() {
      return view('declaration-incident-from');
    }

    public function sendContactForm(Request $request) {

      $validator = $request->validate([
        'nom' =>  'required|string',
        'prenom'  =>  'required|string',
        'email' =>  'required|email',
        'phone' =>  'required|string|max:9',
        'message' =>  'required|string'
      ]);
      // dd($request);

      Mail::to("almamy@smartechguinee.com")
        ->send(new Contact($request->except("_token")));

        return redirect('/contact-us')->withSuccess("Success!");
    }
}
