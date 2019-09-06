<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Document;
use Illuminate\Support\Facades\Storage;
class DocumentationController extends Controller
{
    //

    public function index($slug) {
      $docs = Document::where("type",$slug)->get();
    	return view('documentation')->withDetails($docs)->withSlug($slug);
    }

    public function downloadFile($slug) {
      $doc = Document::where("slug",$slug)->first();
      return Storage::download($doc->file);
    }
}
