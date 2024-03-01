<?php
require_once __DIR__.'/../vendor/autoload.php';
	
	use App\Config\Config;
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

function config(string $key,$default = null)
{
  return Config::$config[$key] ?? $default;
}
function asset($path) {
    $baseUrl = $_SERVER['HTTP_HOST'];
    return "http://$baseUrl/$path";
}