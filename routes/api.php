<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'api'], function() {
    Route::get('/get_teams',  'EvaluationApiController@getTeams');
});

Route::group(['middleware' => 'api'], function() {
    Route::get('/forsearch',  'EvaluationApiController@getMatchesforSearch');
});

Route::group(['middleware' => 'api'], function() {
    Route::get('/forUserIndex/{id}',  'UserController@getUserForIndex');
});

Route::group(['middleware' => 'api'], function() {
    Route::get('/forUserPost/{id}',  'UserController@forUserPost');
});

Route::group(['middleware' => 'api'], function() {
    Route::get('/forUserCheckin/{id}',  'UserController@forUserCheckin');
});

Route::group(['middleware' => 'api'], function() {
    Route::get('/forUserEvaluation/{id}',  'UserController@forUserEvaluation');
});

Route::group(['middleware' => 'api'], function() {
    Route::get('/getMatchReviewData/{id}',  'MatchReviewController@getMatchReviewData');
});

Route::group(['middleware' => 'api'], function() {
    Route::get('/getPlayerRanking',  'EvaluationApiController@getPlayerRanking');
});

Route::group(['middleware' => 'api'], function() {
    Route::get('/getTeams',  'EvaluationApiController@getTeams');
});

Route::group(['middleware' => 'api'], function() {
    Route::post('/getPlayerComments/{id}',  'MatchReviewController@getPlayerComments');
});


Route::group(['middleware' => 'api'], function() {
    Route::post('/get_matches',  'EvaluationApiController@getMatches');
});

Route::group(['middleware' => 'api'], function() {
    Route::post('/get_players',  'EvaluationApiController@getPlayers');
});

Route::group(['middleware' => 'api'], function() {
    Route::post('/getCounts',  'CheckinController@getCounts');
});

Route::group(['middleware' => 'api'], function() {
    Route::post('/judge',  'CheckinController@judge');
});

Route::group(['middleware' => 'api'], function() {
    Route::post('/checkin/store',  'CheckinController@store');
});

Route::group(['middleware' => 'api'], function() {
    Route::post('/checkin/destroy',  'CheckinController@destroy');
});


