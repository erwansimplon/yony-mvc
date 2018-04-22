<?php
	
	class ModelsCore
	{
		protected $mysql;
		
		/**
		 * ModelsCore constructor.
		 */
		function __construct()
		{
			Autoloader::register(_DIR_YONY_CONFIG_ ."Database");
            
			$this->mysql = new Database('bdd','host', 'id', 'pass');
			
			// DEFINITION DE L'HEURE LOCALE
			setlocale(LC_TIME, 'fr', 'fr_FR', 'fr_FR.UTF-8');
			date_default_timezone_set('Europe/Paris');
		
			$this->date = date('Y-m-d');
		}
		
	}