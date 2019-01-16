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

Auth::routes();


// RESTAURANT ROUTES
Route::get('/', 'HomepageController@index');
Route::get('/restaurant/{attribute}', 'HomepageController@getUrl');
// END RESTAURANT ROUTES


// PROFILE ROUTES
Route::get('/profile/{attribute}', 'ProfileController@getUrl');
// END PROFILE ROUTES


// MANAGER ROUTES

// END MANAGER ROUTES