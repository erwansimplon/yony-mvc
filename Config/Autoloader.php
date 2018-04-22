<?php

	class Autoloader
	{
		/**
		 * Enregistre notre autoloader
		 *
		 * @param $class
		 */
		static function register($class){
			
			$tab = explode('\\', $class);
			
			$path = implode(DIRECTORY_SEPARATOR, $tab) . '.php';
			
			include_once($path);
			
		}
	}