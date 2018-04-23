<?php
	
	class ControllerCore
	{
		
		protected $ViewsCore;
		
		function __construct ($models)
		{
			
			set_time_limit(0);

			include ($_SERVER['DOCUMENT_ROOT'].'/Yony/Config/Config.php');
            		include (_DIR_YONY_CONFIG_.'Autoloader.php');
			
			Autoloader::register(_DIR_YONY_CORE_HELPER_SQL_."SelectSqlHelper");
			Autoloader::register(_DIR_YONY_CORE_HELPER_SQL_."ReplaceSqlHelper");
			Autoloader::register(_DIR_YONY_CORE_HELPER_SQL_."UpdateSqlHelper");
			Autoloader::register(_DIR_YONY_CORE_HELPER_SQL_."InsertSqlHelper");
			Autoloader::register(_DIR_YONY_CORE_HELPER_SQL_."DeleteSqlHelper");
			
			Autoloader::register(_DIR_YONY_CORE_MODELS_."ModelsCore");
			Autoloader::register(_DIR_YONY_CORE_VIEWS_."ViewsCore");
			
			Autoloader::register(_DIR_YONY_MODELS_.$models."Models");
			
			$this->ViewsCore = new ViewsCore();
			
		}
		
	}
