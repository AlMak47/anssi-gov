<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Pages;
class AcceuilController extends Controller
{
    //

    public function index() {
    	$articles = Article::orderBy('created_at','desc')->limit(3)->get();
    	$articlesMobiles = Article::orderBy('created_at','desc')->limit(8)->get();
    	$banniere = Article::orderBy('created_at','asc')->limit(4)->get();

    	return view('acceuil')->withArticles($articles)->withBanniere($banniere)->withMobiles($articlesMobiles);
    }

    public function declarationVulnerabilite() {
    	return view('declaration-vulnerabilite');
    }

    public static function voirAussi() {
    	$voir = Pages::where('tag','voir_aussi')->orderBy('created_at','asc')->get();
					foreach ($voir as $key => $value) {
						echo "<li><a class='uk-button uk-button-text' href=\"".url('/voir-aussi/'.$value->slug)."\"><span uk-icon='icon:check;ratio:.8'></span> ".$value->titre."</a></li>";
					}
    }
}
