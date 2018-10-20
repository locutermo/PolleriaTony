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
   // return view('welcome');
    return redirect('/login');

});
Route::get('/test', function () {
    // return view('welcome');
    return view('material-d.index');
 
 });

Auth::routes();
Route::get('login', function(){
    return view('auth.login');
});

Route::namespace('Auth')->group(function(){
    Route::post('login', 'LoginController@login')->name('login');
    Route::post('logout', 'LoginController@logout')->name('logout');
});

Route::namespace('Auth')->group(function(){
    Route::post('login', 'LoginController@login')->name('login');
    Route::post('logout', 'LoginController@logout')->name('logout');
});


