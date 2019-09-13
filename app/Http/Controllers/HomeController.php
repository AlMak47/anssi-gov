<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Requests\ArticleRequest;
use App\Http\Requests\PresentationRequest;
use App\Http\Requests\DocumentRequest;
use App\Http\Requests\ArticleEditRequest;
use App\Http\Requests\VideoRequest;
use App\Http\Requests\PartnerRequest;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


use App\Exceptions\ArticleException;

use App\Article;
use App\Pages;
use App\Document;
use App\Partners;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function articleIndex() {
        $articles = Article::orderBy('created_at','desc')->get();
        return view('admin.article')->withArticles($articles);
    }

    public function editArticle($slug) {
      $edit   = Article::where('slug',$slug)->first();
      return view('admin.edit-article')->withEdit($edit);
    }
// add new post to the news
    public function postArticle(ArticleRequest $request) {
        try {

             $article    = new Article;
            $article->slug  =  Str::slug($request->input('titre'),'-') ;
            $article->titre = $request->input('titre');
            $article->contenu = $request->input('contenu');
            if($request->hasFile('image')) {
                $article->image = Str::random(5).time().'.'.$request->file('image')->getClientOriginalExtension();
                if($request->file('image')->isValid()) {
                    $chemin = config('article.path');
                    if($request->file('image')->move($chemin,$article->image)) {
                        $article->save();
                        return redirect('/admin/articles')->with('success',"Ajouté avec success!");
                    }
                    else {
                        throw new ArticleException("Erreur de telechargement");

                    }
                }
                else {
                    throw new ArticleException("Fichier invalide");
                }
            } else {
                throw new ArticleException("Fichier inexistant");
            }

        } catch (ArticleException $e) {
            return back()->withError($e->getMessage());
        }
    }

    public function documentIndex() {
        return view('admin.document');
    }

    public function mediaIndex() {
        return view('admin.media');
    }

    //

    public function presentationIndex() {
        $presentations = Pages::where('tag','presentation')->get();
        return view('admin.presentation')->withPresentations($presentations);
    }

    public function VoirIndex() {
        $voirAussi = Pages::where('tag','voir_aussi')->orWhere('tag','administration')->orWhere('tag','cadre_legal')->orWhere('tag','outil')->orWhere('tag','doc_form')->orderBy('created_at','desc')->get();
        return view("admin.voir-aussi")->withVoir($voirAussi);
    }

// add new pages content
    public function postPresentation (PresentationRequest $request) {
        $page = new Pages;
        $page->titre = $request->input('titre');
        $page->slug = Str::slug($request->input('titre'),'-');
        $page->contenu = $request->input('contenu');
        $page->tag = $request->input('tag');
        $page->save();
        if($request->input('tag')  == "presentation") {
            return redirect('admin/anssi-guinee')->with('success',"Volet Ajouté!");
        } else {
            return redirect('admin/voir-aussi')->with('success',"Volet Ajouté!");
        }
    }

    public function editPage($slug) {
        $edit = Pages::where('slug',$slug)->first();
        return view('admin.edit-page')->withEdit($edit);
    }
// Edition du contenu d'une page
    public function makeEditPage(PresentationRequest $request,$slug) {
        $contentEdit = Pages::where('slug',$slug)->update([
            'titre' =>  $request->input('titre'),
            'contenu'   =>  $request->input('contenu')
        ]);
        return back()->with('success',"Modifications prise en compte!");
    }
// Edition a post on the news
public function makeEditArticle(ArticleEditRequest $request,$slug) {
  $article = Article::find($slug);

  $article->slug = Str::slug($request->input('titre'),'-');
  $article->titre   = $request->input('titre');
  $article->contenu = $request->input('contenu');
  if($request->hasFile('image')) {
    //change post's image
      if(File::delete(asset('article/'.$article->image))) {
        if($request->file('image')->move(config('article.path'),$article->image)) {
          $article->save();
          return redirect("/admin/articles/".$article->slug."/edit")->withSuccess("Modification enregistrée!");
        } else {
          return back()->with("_errors","Erreur de telechargement!");
        }
    } else {
      // image doesn't exist
      return back()->with("_errors","Fichier inexistant!");
    }
} else {
    // without image
    $article->save();
  }
  return redirect("/admin/articles/".$article->slug."/edit")->withSuccess("Modification enregistrée!");

}

// add a document
    public function addDocument(DocumentRequest $request) {
      // dd($request);
      $doc = new Document;
      $doc->slug = Str::slug($request->input('titre'),'-');
      $doc->titre = $request->input('titre');
      $doc->type = $request->input('type');
      if($request->hasFile('fichier')) {
        $extension = $request->file('fichier')->getClientOriginalExtension();
        $doc->file = $doc->slug.'.'.$extension;
        if($request->file("fichier")->move(config('document.path'),$doc->file)) {
          $doc->save();
          return redirect('admin/documents')->with('success',"Document Ajouté!");
        } else {
          return back()->with("_errors","Erreur de Telechargement!");
        }
      } else {
        return back()->with("_errors","Erreur sur le fichier!");
      }
    }

    // add video with youtube link

    public function addVideo(VideoRequest $request) {
      dd($request);
    }

    // Supprimer une page

    public function deletePage($slug) {
      Pages::where('slug',$slug)->delete();
      return redirect('/admin/voir-aussi')->withSuccess("Supprime avec success!");
    }

    // add a partner
    public function getFormPartner() {
      return view('admin.partner');
    }

    public function postFormPartner(PartnerRequest $request) {
      try {
        if($request->hasFile('logo')) {
          $partners = new Partners;
          $partners->slug = Str::slug($request->input('organisation','-'));
          $partners->Organisation = $request->input('organisation');
          $partners->tag = $request->input('tag');
          $partners->logo = $partners->slug.'.'.$request->file('logo')->getClientOriginalExtension();
          $partners->description = $request->input('description');
          if($request->file('logo')->move(config('partner.path'),$partners->logo)) {
            $partners->save();
            return redirect('/admin/partners')->withSuccess("Ajouté avec success!");
          }
        }
        else {
          throw new Exception("Fichier invalie!");
        }

      } catch (ArticleException $e) {
        return back()->with("_errors",$e->getMessage());
      }

    }
}
