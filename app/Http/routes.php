<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::auth();

Route::get('/', function () {
    return redirect()->route('films.index');
});

// films
Route::get('films', [
    'uses' => 'FilmController@index',
    'as'   => 'films.index'
]);
Route::get('films/create', [
    'uses' => 'FilmController@create',
    'as'   => 'films.create'
]);
Route::get('films/edit/{id}', [
    'uses' => 'FilmController@edit',
    'as'   => 'films.edit'
]);
Route::get('films/{slug}/{name?}', [
    'uses' => 'FilmController@show',
    'as'   => 'films.show'
])->where('slug', '[\w\d\-\_]+');
Route::post('films', [
    'uses' => 'FilmController@store',
    'as'   => 'films.store'
]);
Route::put('films/{id}', [
    'uses' => 'FilmController@update',
    'as'   => 'films.update'
]);

// Directors
Route::get('directors', [
    'uses' => 'DirectorController@index',
    'as'   => 'director.index'
]);
Route::get('directors/{id}', [
    'uses' => 'DirectorController@edit',
    'as'   => 'director.edit'
]);
Route::post('director', [
    'uses' => 'DirectorController@store',
    'as'   => 'director.create'
]);
Route::put('director/{id}', [
    'uses' => 'DirectorController@update',
    'as'   => 'director.update'
]);

// Actors
Route::get('actors', [
    'uses' => 'ActorController@index',
    'as'   => 'actor.index'
]);
Route::get('actors/{id}', [
    'uses' => 'ActorController@edit',
    'as'   => 'actor.edit'
]);
Route::post('actors', [
    'uses' => 'ActorController@store',
    'as'   => 'actor.store'
]);
Route::put('actors/{id}', [
    'uses' => 'ActorController@update',
    'as'   => 'actor.update'
]);

// genre
Route::get('genres', [
    'uses' => 'GenreController@index',
    'as'   => 'genres.index'
]);
Route::get('genres/edit/{id}', [
    'uses' => 'GenreController@edit',
    'as'   => 'genres.edit'
]);
Route::get('/genres/{slug}/{id?}', [
    'uses' => 'GenreController@cinema',
    'as'   => 'cinema.genre'
]);
Route::put('genres/{id}', [
    'uses' => 'GenreController@update',
    'as'   => 'genres.update'
]);


// classifications
Route::get('classifications', [
    'uses' => 'ClassificationController@index',
    'as'   => 'classification.index'
]);
Route::get('classification/{id}', [
    'uses' => 'ClassificationController@edit',
    'as'   => 'classification.edit'
]);
Route::put('classification/{id}', [
    'uses' => 'ClassificationController@update',
    'as'   => 'classification.update'
]);

// cinemas
Route::get('cinemas', [
    'uses' => 'CinemaController@index',
    'as'   => 'cinemas.index'
]);
Route::get('cinema/{id}', [
    'uses' => 'CinemaController@edit',
    'as'   => 'cinemas.edit'
]);
Route::get('cinemas/{slug}', [
    'uses' => 'CinemaController@show',
    'as'   => 'cinemas.show'
])->where('slug', '[\w\d\-\_]+');
Route::put('cinema/{id}', [
    'uses' => 'CinemaController@update',
    'as'   => 'cinemas.update'
]);

// A Propos
Route::get('/association', [
    'uses' => 'AboutController@association',
    'as'   => 'about.association'
]);
Route::get('historique', [
    'uses' => 'AboutController@history',
    'as'   => 'about.history'
]);
Route::get('adminhistorique', [
    'uses' => 'AboutController@historyindex',
    'as'   => 'about.historyindex'
]);
Route::get('historique/{id}', [
    'uses' => 'AboutController@historyedit',
    'as'   => 'about.historyedit'
]);
Route::put('historique/{id}', [
    'uses' => 'AboutController@historyupdate',
    'as'   => 'history.update'
]);
Route::post('historique/create', [
    'uses' => 'AboutController@historystore',
    'as'   => 'history.create'
]);
Route::delete('historique/{id}', [
    'uses' => 'AboutController@historydelete',
    'as'   => 'about.historydelete'
]);






// Admin
Route::get('admin', [
    'uses' => 'AdminController@index',
    'as'   => 'admin.index'
]);
// films
Route::get('adminfilms', [
    'uses' => 'FilmController@adminindex',
    'as'   => 'adminfilms.index'
]);
// cinemas
Route::get('admincinemas', [
    'uses' => 'AdminController@cinemas',
    'as'   => 'admin.cinemas'
]);
Route::get('admingenres', [
    'uses' => 'GenreController@genres',
    'as'   => 'admin.genres'
]);