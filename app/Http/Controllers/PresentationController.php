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

    public function detailsAdministration($tag,$slug)  {
      $details = Pages::where('slug',$slug)->first();
    	return view('detail-administration')->withDetails($details)->withTag($tag);
    }

    public function cadreLegalIndex($slug) {
      $cadre = Pages::where('slug',$slug)->first();
      $tab = [
        'lois'  =>  ['loi'],
        'decrets-et-arretes'  =>  ['decret','arrete'],
        'decision'  =>  ['decision'],
        'documents-strategiques' =>  ['document_strategique']
      ];
      return view('cadre-legal')->withCadre($cadre)->withTab($tab);
    }


}
