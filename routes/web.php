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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return view('test');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/players', 'PlayerController@show')->name('players_lists');

Route::get('/evaluation/form', 'EvaluationController@index')->name('evaluation_form');

Route::post('/create/team', 'TeamController@create')->name('create');

Route::post('/create/player', 'PlayerController@create')->name('player_create');
