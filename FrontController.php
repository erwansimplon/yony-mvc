<?php
	/**
	 * Created by Erwan.
	 * Date: 17/10/2017
	 * Time: 09:23
	 */

	include ('Config/Config.php');
	include (_DIR_YONY_CONFIG_.'Autoloader.php');
	
	Autoloader::register(_DIR_YONY_CORE_CONTROLLER_."ControllerCore");
	Autoloader::register(_DIR_YONY_CORE_VIEWS_ . "ViewsCore");
	
	if(isset($_GET['page'])){
		$class = $_GET['page']."Views";
		Autoloader::register(_DIR_YONY_CONTROLLER_.$_GET['page']."Controller");
		Autoloader::register(_DIR_YONY_VIEWS_.$_GET['page']."Views");
		$view = new $class('Yony', 'css-'.$_GET['page']);
	}
	else{
		Autoloader::register(_DIR_YONY_VIEWS_."HomeViews");
		$view = new HomeViews('Yony', 'css-Home');
	}