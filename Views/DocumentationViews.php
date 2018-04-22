<?php
	/**
	 * Created by Erwan.
	 * Date: 04/02/2018
	 * Time: 22:15
	 */
	
	class DocumentationViews extends ViewsCore
	{
		
		/**
		 * IndexViews constructor.
		 */
		public function __construct ($title, $style)
		{
			$this->head($title, $style);
			
			$this->Content();
			
			$this->script('jquery');
			$this->script('js-slide');
			$this->script('js-principal');
			$this->close_page();
		}
		
		/**
		 * Fonction principal
		 */
		public function Content ()
		{
			$this->Logo();
			$this->menu();
			
			$this->div("container container_documentation");
				$this->menu_left();
				$this->div_center();
			$this->close_div();
			
			$this->FooterSite();
			
		}
		
		public function Logo(){
			$this->div('logo');
				$this->a('/','link_home');
					$this->img('miniature','logo_img','miniature_logo');
				$this->close_a();
			$this->close_div();
		}
		
		public function menu_left(){
			$this->div("block_div_menu_left");
				$this->ul("menu-left");
					$this->li("Présentation", "maintab", false, "tab");
					$this->li("Structure", "maintab", false, "tab");
						$this->li("Assets", "main-sub-menu assets-menu", false, "tab");
							$this->li("Document", "sub-menu assets-sub-menu", "doc-document");
							$this->li("Languages", "sub-menu assets-sub-menu", "doc-languages");
						$this->li("Config", "main-sub-menu", false, "tab");
						$this->li("Controller", "main-sub-menu", false, "tab");
						$this->li("Core", "main-sub-menu core-menu", false, "tab");
							$this->li("Controller", "sub-menu core-sub-menu", "doc-core-controller");
							$this->li("Helper", "sub-menu core-sub-menu", "doc-core-helper");
							$this->li("Models", "sub-menu core-sub-menu", "doc-core-models");
							$this->li("Views", "sub-menu core-sub-menu", "doc-core-views");
						$this->li("Models", "main-sub-menu", false, "tab");
						$this->li("Views", "main-sub-menu", false, "tab");
						$this->li("FrontController", "main-sub-menu", "doc-front-controller");
					$this->li("Htaccess", "maintab", false, "tab");
				$this->close_ul();
			$this->close_div();
			
		}
		
		public function div_center(){
			$this->div("block_div_center");
			$this->close_div();
		}
	}