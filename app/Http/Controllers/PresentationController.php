<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pages;
class PresentationController extends Controller
{
    //

    public function index() {
    	return view('presentation');
    }

    public function detailPresentation($slug) {
    	$details = Pages::where('slug',$slug)->first();
    	return view('detail-presentation')->withDetails($details);
    }

    public function detailVoirAussi($slug) {
    	$details = Pages::where('slug',$slug)->first();
    	return view('detail-voir-aussi')->withDetails($details);
    }
}
