<?php
Route::middleware(['route','admin'])->group(function () {
	Route::get('/', function () {
		 return redirect('/index');
	 });
	Route::get('index', function(){
		return view('admin.home');
	  });


});
