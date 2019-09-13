<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pages;

class FormationController extends Controller
{
    //

    public function index($slug) {
      $page = Pages::where("slug",$slug)->where('tag','doc_form')->first();
    	return view('formation')->withPage($page);
    }
}
