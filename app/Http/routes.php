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
// film filter
Route::get('films/{slug}/{name?}', [
    'uses' => 'FilmController@filter',
    'as'   => 'films.filter'
]);
// show film
Route::get('film/{slug}/{name?}', [
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

// Animations
Route::get('animations', [
    'uses' => 'AnimationController@index',
    'as'   => 'animation.index'
]);
Route::get('adminanimations', [
    'uses' => 'AnimationController@adminIndex',
    'as'   => 'animation.adminindex'
]);
Route::get('animation/{id}', [
    'uses' => 'AnimationController@show',
    'as'   => 'animation.show'
]);
Route::get('animations/create', [
    'uses' => 'AnimationController@create',
    'as'   => 'animation.create'
]);
Route::post('animation', [
    'uses' => 'AnimationController@store',
    'as'   => 'animation.store'
]);
Route::put('animation/{id}', [
    'uses' => 'AnimationController@update',
    'as'   => 'animation.update'
]);

// Festivals
Route::get('festivals', [
    'uses' => 'FestivalController@index',
    'as'   => 'festival.index'
]);
Route::get('festivals/create', [
    'uses' => 'FestivalController@create',
    'as'   => 'festival.create'
]);
Route::get('festivals/{slug}', [
    'uses' => 'FestivalController@show',
    'as'   => 'festival.show'
]);
Route::post('festivals', [
    'uses' => 'FestivalController@store',
    'as'   => 'festival.store'
]);

// About
Route::get('association', [
    'uses' => 'AboutController@association',
    'as'   => 'about.association'
]);
Route::get('equipe', [
    'uses' => 'AboutController@team',
    'as'   => 'about.team'
]);
Route::get('member', [
    'uses' => 'AboutController@member',
    'as'   => 'about.member'
]);
Route::post('member', [
    'uses' => 'AboutController@memberstore',
    'as'   => 'member.store'
]);
Route::get('historique', [
    'uses' => 'AboutController@history',
    'as'   => 'about.history'
]);
Route::get('adminhistorique', [
    'uses' => 'AboutController@historyindex',
    'as'   => 'history.index'
]);
Route::get('historique/{id}', [
    'uses' => 'AboutController@historyedit',
    'as'   => 'history.edit'
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
    'as'   => 'history.delete'
]);

// Bistrot
Route::get('bistrot', [
    'uses' => 'BistrotController@index',
    'as'   => 'bistrot.index'
]);

// Member
Route::get('members', [
    'uses' => 'MemberController@index',
    'as'   => 'member.index'
]);
Route::get('members/new', [
    'uses' => 'MemberController@newMembers',
    'as'   => 'member.new'
]);
Route::put('member/{id}', [
    'uses' => 'MemberController@update',
    'as'   => 'member.update'
]);
Route::get('member/{id}', [
    'uses' => 'MemberController@show',
    'as'   => 'member.show'
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
    'uses' => 'CinemaController@admincinemas',
    'as'   => 'admin.cinemas'
]);
Route::get('admingenres', [
    'uses' => 'GenreController@genres',
    'as'   => 'admin.genres'
]);