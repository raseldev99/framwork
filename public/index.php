<?php
	require_once __DIR__.'/../vendor/autoload.php';
	use App\Controllers\Controller;
	use App\Route;
	Route::get('/test',[Controller::class,'index']);
	Route::run();