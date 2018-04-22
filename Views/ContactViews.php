<?php
	/**
	 * Created by Erwan.
	 * Date: 04/02/2018
	 * Time: 22:15
	 */
	
	class ContactViews extends ViewsCore
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
			
			$this->div("container container_contact");
				$this->Email();
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
		
		public function Email(){
			
			$this->div("block_div_contact");
			
				$this->h1('block_title_contact','Contact');
				
				$this->form('#', 'post');
				
					$this->input('text', 'input_form_contact', 'email', '', '', 'Votre E-Mail');
					$this->input('text', 'input_form_contact', 'objet', '', '', 'Objet');
					$this->textarea('10', '40', 'Message', 'Message');$this->close_textarea();
					$this->button('submit', 'button_form_contact');
						$this->span('Envoyé ');
					$this->close_button();
				
				$this->close_form();
			
			$this->close_div();
			
		}
	}