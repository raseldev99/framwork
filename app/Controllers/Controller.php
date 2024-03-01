<?php
	
	namespace App\Controllers;
	
	class Controller
	{
		public function index()
		{
		   return view('welcome',['name'=>'Rasel Ahmed']);
		}
		
	}