<?php
	/**
	 * Created by Erwan.
	 * Date: 04/02/2018
	 * Time: 22:09
	 */
	
	class ContactController extends ControllerCore
	{
		/**
		 * @var \ContactModels
		 */
		protected $models;
		
		/**
		 * ContactController constructor.
		 */
		public function __construct ()
		{
			parent::__construct('Contact');
			$this->models = new ContactModels();
			$this->Content();
		}
		
		/**
		 * Fonction principal
		 */
		public function Content ()
		{
		
		}
	}