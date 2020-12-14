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