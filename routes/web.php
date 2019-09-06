<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//
Route::get('/','AcceuilController@index');
Route::get('/anssi-guinee/{slug}','PresentationController@detailPresentation');
Route::get('/anssi-guinee','PresentationController@index');
Route::get('/declaration-incident','ContactController@getIncidentForm');
Route::get('/voir-aussi/{slug}','PresentationController@detailVoirAussi');

Route::get('/news/{slug}','ArticleController@detailArticle');
Route::get('/news','ArticleController@index');
Route::get('/documentation/{slug}','DocumentationController@index');

Route::get('/contact-us','ContactController@getForm');
Route::get('/formation','FormationController@index');
Route::get('/recrutement','RecrutementController@index');
//
Auth::routes();
// All get requests
Route::get('/admin/articles','HomeController@articleIndex');
Route::get('/admin/documents','HomeController@documentIndex');
Route::get('/admin/medias','HomeController@mediaIndex');
Route::get('/admin/anssi-guinee','HomeController@PresentationIndex');
Route::get('/admin/voir-aussi','HomeController@VoirIndex');
Route::get('/admin/articles/{slug}/edit','HomeController@editArticle');
Route::get('/admin/edit-page/{slug}','HomeController@editPage');

// All post requests
Route::post('/admin/edit-page/{slug}','HomeController@makeEditPage');
Route::post('/admin/post-page','HomeController@postPresentation');
Route::post('/admin/documents/add','HomeController@addDocument');
Route::post('/admin/post-article','HomeController@postArticle');
Route::post('/admin/articles/{slug}/edit','HomeController@makeEditArticle');
Route::post('/admin/media/add-video','HomeController@addVideo');
