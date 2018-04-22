<?php
	
	class DeleteSqlHelper
	{
		private $delete;
		
		public function delete($table){
			
			$this->delete = 'DELETE FROM '.$table;
			
			return $this->delete;
		}
	}