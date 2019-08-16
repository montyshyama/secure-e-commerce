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
Route::middleware('auth:admin')->group(function() {

	Route::get('/', 'DashboardController@index');

	//Product
	Route::resource('/products', 'ProductController');
	Route::post('/store', 'ProductController@store');

	//Order
	Route::resource('/orders', 'OrderController');
	Route::get('/confirm/{id}','OrderController@confirm')->name('order.confirm');
	Route::get('/pending/{id}','OrderController@pending')->name('order.pending');

	//Users
	Route::resource('/users', 'UsersController');
	Route::get('/adminLogout', 'AdminUserController@logout');

});

//Admin Login
Route::get('/adminLogin', ['as' => 'login', 'uses' => 
	'AdminUserController@index']);
Route::post('/adminLogin', ['as' => 'login', 'uses' => 
	'AdminUserController@store']);
	









