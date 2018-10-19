<?php
	Route::get('/',function(){
		return view('admin.home');
	});


	Route::get('/test', function () {
		return view('test');
});

