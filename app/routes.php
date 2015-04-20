<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', array('uses' => 'HomeController@showWelcome'));

Route::controller('password', 'RemindersController');

// route to show the login form
Route::get('login', array('uses' => 'HomeController@showLogin'));

// route to process the form
Route::post('login', array('uses' => 'HomeController@doLogin'));

// route to show the login form
Route::get('register', array('uses' => 'HomeController@getRegister'));

// route to process the form
Route::post('register', array('uses' => 'HomeController@postRegister'));



Route::get('logout', array('uses' => 'HomeController@doLogout'));
Route::group(array('before' => 'auth'), function()
{
	Route::pattern('id', '[0-9]+');
	
	Route::get('lotteries/{id?}', array('uses' => 'LotteryController@listLottery'));

	Route::get('lottery/{id}', array('uses' => 'LotteryController@getLottery'));
	
	Route::get('lottery/add/{id}', array('uses' => 'LotteryController@setLottery'));

	Route::post('lottery/{id}', array('uses' => 'LotteryController@postLottery'));

	Route::get('drawings', array('uses' => 'DrawingController@listDrawing'));
	
	Route::get('drawings/generate', array('uses' => 'DrawingController@generateDrawings'));

	Route::get('draw/{id}', array('uses' => 'DrawingController@drawDrawing'));
});