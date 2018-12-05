<?php
Route::middleware(['route','admin'])->group(function () {
		Route::get('/', function () {
			return redirect('/admin/index');
		});
		Route::get('index', function(){
			return view('admin.home');
		});
		Route::get('users','UserController@index');
		Route::post('users/store','UserController@store');
	  	Route::post('users/carnetValidation','UserController@carnetValidation');
	  	Route::post('users/dniValidation','UserController@dniValidation');
	  	Route::get('users/{id}/information','UserController@information');

		Route::get('users/{id}/edit', 'UserController@edit');
		Route::post('users/update', 'UserController@update');
		Route::post('users/{id}/destroyValidation', 'UserController@destroyValidation');
		Route::post('users/{id}/destroy', 'UserController@destroy');

		Route::get('orders','OrderController@index');
		Route::post('orders/store','OrderController@store');
		Route::get('orders/{id}/edit','OrderController@edit');
		Route::post('orders/product','OrderController@product');
		Route::post('orders/update', 'OrderController@update');

		//Ruta para tables
		Route::get('tables','TableController@index');
		Route::post('tables/store','TableController@store');
		Route::get('tables/{id}/edit', 'TableController@edit');
		Route::post('tables/update', 'TableController@update');
		Route::post('tables/{id}/destroyValidation', 'TableController@destroyValidation');
		Route::post('tables/{id}/destroy', 'TableController@destroy');

		//Ruta Productos
		Route::get('products','ProductController@index');
		Route::post('products/{id}/destroyValidation','ProductController@destroyValidation');
		Route::post('products/{id}/destroy','ProductController@destroy');
		Route::post('products/store','ProductController@store');
		Route::get('products/{id}/edit','ProductController@edit');
		Route::post('products/update','ProductController@update');
});
