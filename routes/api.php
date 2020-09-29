<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('login/google', 'LoginController@redirectToGoogleProvider');
Route::get('login/google/callback', 'LoginController@handleGoogleProviderCallback');
Route::get('login/facebook', 'LoginController@redirectToFacebookProvider');
Route::get('login/facebook/callback', 'LoginController@handleFacebookProviderCallback');

Route::middleware('auth:api')->group(function () {
    
    Route::resource('genders', 'GenderAPIController');

    Route::resource('players', 'PlayerAPIController');

    Route::resource('addresses', 'AddressAPIController');

    Route::resource('sports', 'SportAPIController');

    Route::resource('teams', 'TeamAPIController');

    Route::resource('tournaments', 'TournamentAPIController');

    Route::resource('associates', 'AssociateAPIController');

    Route::resource('associate_galleries', 'AssociateGalleryAPIController');

    Route::resource('sport_courts', 'SportCourtAPIController');

    Route::resource('transactions', 'TransactionAPIController')->middleware('auth:sanctum');

    Route::resource('matches', 'MatchAPIController');

    Route::resource('associate_sport_court_prices', 'AssociateSportCourtPriceAPIController');
});
 
