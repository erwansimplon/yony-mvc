<?php
	/**
	 * Created by Erwan.
	 * Date: 04/02/2018
	 * Time: 22:15
	 */
	
	class HomeViews extends ViewsCore
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
			
			$this->Slider();
			
			$this->div("container container_index");
				$this->Download();
				$this->Feature();
			$this->close_div();
			
			$this->FooterSite();
			
		}
		
		public function Logo(){
			$this->div('logo');
				$this->a('http://www.yony.fr/','link_home');
					$this->img('miniature','logo_img','miniature_logo');
				$this->close_a();
			$this->close_div();
		}
		
		public function Slider(){
			$this->div("slider");
				$this->div("","sliderImg");
					$this->img('logo','image','logo');
				$this->close_div();
			$this->close_div();
		}
		
		public function Download(){
			
			$this->div("block_div_download");
			
				$this->h1('block_title_download','Concentrez-vous sur l\'essentiel ...');
		
				$this->p('Accélérez la création et la maintenance de vos applications web PHP.
						         Terminez les tâches de codage répétitives ! <br />
								 Yony vous donnera accès à une architecture de site
								 déjà prefabrique sous la forme d\'un MVC et de
								 nombreuses autre fonctionnalité déjà configurer.');
		
				$this->a('yony', 'button_download', 'Télécharger');
				$this->close_a();
			
			$this->close_div();
			
		}
		
		public function Feature(){
			
			$this->div("block_div_feature");
			
				$this->h1('block_title_feature','À propos de Yony');
			
				$this->p('Modèle MVC (modèle-vue-contrôleur)', 'fa fa-arrow-right' ,'i');
				$this->p('Requète SQL en format tableau' , 'fa fa-arrow-right','i');
				$this->p('Bibliothèque de code pour les mails, csv, ftp ...', 'fa fa-arrow-right','i');
				$this->p('Code HTML sous forme de fonction PHP', 'fa fa-arrow-right','i');
			
				$this->a('', 'button_detail', '');
					$this->span('Documentation ');
				$this->close_a();
				
			$this->close_div();
		}
	}