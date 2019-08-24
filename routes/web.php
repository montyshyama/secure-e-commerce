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

//Front
Route::get('/', 'HomeController@index');
Route::get('/user/register', 'RegistrationController@index');
Route::post('/user/register', 'RegistrationController@store');
//User profile
Route::get('/user/profile', 'UserProfileController@index');
Route::get('/user/order/{id}', 'UserProfileController@show');


Route::get('/user/login', 'SessionsController@index');
Route::post('/user/login', 'SessionsController@store');
Route::get('/user/logout', 'SessionsController@logout');

//Cart
Route::get('/cart', 'CartController@index');
Route::post('/cart', 'CartController@store')->name('cart');
Route::delete('/cart/remove/{product}', 'CartController@destroy')->name('cart.destroy');
Route::post('/cart/savelater/{product}', 'CartController@saveLater')->name('cart.saveLater');


Route::get('/empty', function() {
	Cart::instance('default')->destroy();

});













