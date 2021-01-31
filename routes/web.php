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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


/**
*	Backend Routes
*/
Route::get('/dashboard', 'Backend\DashboardController@index')->name('dashboard');

Route::resource('/roles', 'Backend\RolesController', ['names' => 'roles']);

Route::resource('/teams', 'Backend\UsersController', ['names' => 'users']);

Route::resource('/riders', 'Backend\RidersController', ['names' => 'riders']);

Route::resource('/packages', 'Backend\PackagesController', ['names' => 'packages']);

Route::resource('/parcels', 'Backend\ParcelsController', ['names' => 'parcels']);
Route::get('/parcels/status_confirm/{id}', 'Backend\ParcelsController@status_confirm');
Route::post('/parcels/status_ship/{id}', 'Backend\ParcelsController@status_ship');
Route::post('/parcels/status_reschedule/{id}', 'Backend\ParcelsController@status_reschedule');
Route::get('/parcels/status_return/{id}', 'Backend\ParcelsController@status_return');
Route::get('/parcels/status_done/{id}', 'Backend\ParcelsController@status_done');
Route::get('/parcels/pricing/{id}', 'Backend\ParcelsController@pricing');


Route::resource('/merchants', 'Backend\MerchantsController', ['names' => 'merchants']);
Route::get('/merchants/status/{id}', 'Backend\MerchantsController@status');


/**
*
*	Merchant Routes
*
**/
Route::group(['prefix' => 'merchant'], function () {

	// Dashboard Routes
	Route::get('/', 'Backend\Merchant\MasterController@index')->name('merchant.dashboard');
	// Login Rouutes
	Route::get('/login', 'Backend\Merchant\Auth\LoginController@showLoginForm')->name('merchant.login');
	Route::post('/login/submit', 'Backend\Merchant\Auth\LoginController@login')->name('merchant.login.submit');

	// Register Rouutes
	Route::get('/register', 'Backend\Merchant\Auth\RegisterController@showRegistrationForm')->name('merchant.register');
	Route::post('/register/submit', 'Backend\Merchant\Auth\RegisterController@register')->name('merchant.register.submit');

	// Logout Routes
	Route::post('/logout/submit', 'Backend\Merchant\Auth\LoginController@logout')->name('merchant.logout.submit');

	// Forget Password Routes
	Route::get('/password/reset', 'Backend\Merchant\Auth\ForgotPasswordController@showLinkRequestForm')->name('merchant.password.request');
	Route::post('/password/reset/submit', 'Backend\Merchant\Auth\ForgotPasswordController@reset')->name('merchant.password.update');


});

// Merchant Parcel Routes
Route::resource('/parcels_of_merchant', 'Backend\Merchant\ParcelsController', ['names' => 'merchant_parcels']);