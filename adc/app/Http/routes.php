<?php
use App\User;
use App\Pilot;
use Illuminate\Http\Request;
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
    return view('welcome');
});

Route::get('/home', 'HomeController@index');

// Pilot Profile
Route::get('/profile', 'PilotController@index');
Route::post('/profile', 'PilotController@store');
Route::delete('/profile', 'PilotController@destroy');


// Switch Active Polot
Route::get('/switch', 'PilotController@switchpilot');
Route::post('/switch', 'PilotController@setactivepilot');
Route::get('/create', 'PilotController@create');
// User Profile
Route::get('/user', function() {
	return view('welcome');
});

