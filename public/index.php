<?php
	require_once __DIR__.'/../vendor/autoload.php';
	
	use App\Config\Config;
	use App\Controllers\Controller;
	use App\Route;
	
    Config::run();
	Route::get('/test',[Controller::class,'index']);
	Route::run();