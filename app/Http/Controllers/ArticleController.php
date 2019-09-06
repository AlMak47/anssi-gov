<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class ArticleController extends Controller
{
    //

    public function detailArticle($slug) {
    	$details = Article::where('slug',$slug)->first();
    	$articles = Article::orderBy('created_at','desc')->paginate(10);
    	return view('details-article')->withDetails($details)->withArticles($articles);
    }

    public function index() {
    	$articles = Article::orderBy('created_at','desc')->paginate(4);
    	// $articles->links();
    	return view('news')->withArticles($articles);
    }
}
