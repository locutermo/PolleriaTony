<?php
Route::middleware(['route','admin'])->group(function () {
	Route::get('index', function(){
	  return view('admin.home');
	});



});
