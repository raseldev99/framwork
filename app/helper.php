<?php
use Jenssegers\Blade\Blade;

function view(string $view, array $data = []):int
{
	try {
		$resources_path = __DIR__.'/../resources/';
		$blade = new Blade($resources_path .'views/', $resources_path.'cache/');
		echo $blade->make($view,$data)->render();
		return 0;
	}catch (Exception $e){
		dd($e->getMessage());
	}
}