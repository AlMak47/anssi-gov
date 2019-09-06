<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    //

    public function getForm() {
    	return view('contact-us');
    }

    public function getIncidentForm() {
      return view('declaration-incident-from');
    }
}
