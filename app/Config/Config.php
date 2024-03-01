<?php
	
	namespace App\Config;
	
	use Dotenv\Dotenv;
	
	class Config
	{
		public static array $config = [];
		
		
		public static function setConfig($name,$value):void
		{
		   self::$config[$name] = $value;
		}
		
		public static function run():void
		{
			$dotenv = Dotenv::createImmutable(__DIR__.'/../../');
			$dotenv->load();
			self::setConfig('app.name',$_ENV['APP_NAME']);
		}
		
	}