<?php
	/**
	 * Created by Erwan.
	 * Date: 04/02/2018
	 * Time: 22:12
	 */
	
	class DocumentationModels extends ModelsCore
	{
		protected $mysql;
		
		protected $select;
		protected $insert;
		protected $update;
		protected $replace;
		protected $delete;
		
		protected $date;
		
		public function __construct ()
		{
			parent::__construct();
			
			$this->select = new SelectSqlHelper();
			$this->insert = new InsertSqlHelper();
			$this->update = new UpdateSqlHelper();
			$this->replace = new ReplaceSqlHelper();
			$this->delete = new DeleteSqlHelper();
			
		}
	}