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
Route::prefix('admin')->group(function() {
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
		Route::get('/logout', 'AdminUserController@logout');

	});


	//Admin Login
	Route::get('/login', ['as' => 'login', 'uses' => 
		'AdminUserController@index']);
	Route::post('/login', ['as' => 'login', 'uses' => 
		'AdminUserController@store']);
		
});








