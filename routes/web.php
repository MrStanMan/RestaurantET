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

use App\Product;

Auth::routes(['verify' => true]);


// RESTAURANT ROUTES
Route::get('/', 'HomepageController@index');

Route::get('profile/{user}', function (App\User $user) {
    return view('homepage.profile', compact('user'));
});
Route::get('menukaart', function () {
	$menu = Product::all();
    return view('homepage.menu', compact('menu'));
})->name('menukaart');

Route::get('about', function () { return view('homepage.about'); })->name('about');
Route::get('contact', function () { return view('homepage.contact'); })->name('contact');