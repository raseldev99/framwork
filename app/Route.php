<?php
	namespace App;
	class Route{
		private static array $routes = [];
		
		public static function get(string $route,array $action):void
		{
			self::$routes[$route] = [
				'method' => 'GET',
				'action'=>$action
			];
		}
		
		
		public static function post(string $route,array $action):void
		{
			self::$routes[$route] = [
				'method' => 'POST',
				'action'=>$action
			];
		}
		
		public static function run():void
		{
			$current_method = $_SERVER['REQUEST_METHOD'];
			$non_modified = parse_url($_SERVER['REQUEST_URI']);
			$current_route = trim($non_modified['path'] ?? '','/');
			foreach (self::$routes as $route => $action){
				$method = $action['method'];
				$route = trim($route,'/');
				if ($route === $current_route){
					if ($current_method !== $method){
						dd("This $current_method method not allow for this route. Allow route $method");
					}
					try {
						$controller = $action['action'][0] ?? null;
						$method_action = $action['action'][1] ?? null;
						$controller = new $controller();
						$controller->$method_action();
					}catch (\Error $e){
						dd($e->getMessage());
					}
					return;
				}
			}
			$path = $non_modified['path'];
			die("404 $path not found!");
		}
	}