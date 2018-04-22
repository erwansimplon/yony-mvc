<?php
	/**
	 * Created by Erwan.
	 * Date: 04/02/2018
	 * Time: 22:09
	 */
	
	class DocumentationController extends ControllerCore
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
			parent::__construct('Documentation');
			$this->models = new DocumentationModels();
			$this->Content();
		}
		
		/**
		 * Fonction principal
		 */
		public function Content ()
		{
		
		}
	}