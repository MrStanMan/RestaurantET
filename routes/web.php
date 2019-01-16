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
use Illuminate\Support\Facades\Auth;


Auth::routes(['verify' => true]);


// RESTAURANT ROUTES
Route::get('/', function (){ return view('pages.index'); })->name('home');

Route::post('profile/edit/{customer_nr}', 'AccountController@edit_user')->name('edit_user');
Route::get('profile/edit', 'AccountController@get_user')->name('get_user');
Route::get('profile/{user}', function (App\User $user) { return view('pages.profile', compact('user')); });

Route::get('menukaart', function () {
	$menu = Product::all();
	// dd($menu);
    return view('pages.menu', compact('menu'));
})->name('menukaart');

Route::get('about', function () { return view('pages.about'); })->name('about');
Route::get('contact', function () { return view('pages.contact'); })->name('contact');
Route::get('reserveer', function () { return view('pages.reservation'); })->name('reserveer');
Route::post('reserveer', 'ReservationController@reservate');

Route::group(['prefix' => 'administrator', 'middleware' => ['role:administrator']], function() {
    Route::get('/admin', 'AdminController@welcome')->name('admin_home');
    Route::get('/admin/users', ['middleware' => ['permission:manage-admins'], 'uses' => 'AdminController@manageAdmins']);
});