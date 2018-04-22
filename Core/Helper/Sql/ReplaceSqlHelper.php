<?php
	
	class ReplaceSqlHelper
	{
		private $replace = [];
		private $from = [];
		private $join = [];
		private $conditions = [];
		
		/**
		 * @param $table
		 * @param $colonne
		 *
		 * @return $this
		 */
		public function replace($table, $array){
			
			$this->replace = 'REPLACE INTO '.$table.' (`'.implode('`, `',array_keys($array)).'`)';
			
			$this->replace .= ' SELECT `'.implode('`, `',array_values($array)).'`';
			
			
			return $this;
		}
		
		/**
		 * @param      $table
		 * @param null $alias
		 *
		 * @return $this
		 */
		public function from($table, $alias = null){
			
			$this->from = $table;
			
			if($alias != null){
				$this->from .= ' AS '.$alias ;
			}
			
			return $this;
		}
		
		/**
		 * @param $type
		 * @param $table
		 * @param $liaison
		 *
		 * @return $this
		 */
		public function join($type, $table, $liaison){
			
			$table_join = array_keys($table);
			$alias = array_values($table);
			
			$liaison_from = array_keys($liaison);
			$liaison_to = array_values($liaison);
			
			for($i = 0; $i < count($table_join); $i++){
				
				if($type == 'inner') {
					$this->join = " INNER JOIN ";
				}
				
				else{
					$this->join = " LEFT JOIN ";
				}
				
				$this->join .= "$table_join[$i] $alias[$i] ON $liaison_from[$i] = $liaison_to[$i]";
				
			}
			
			return $this;
		}
		
		/**
		 * @return $this
		 */
		public function where(){
			$this->conditions = func_get_args();
			return $this;
		}
		
		/**
		 * @return string
		 */
		public function __toString(){
			$query = $this->replace
				. ' FROM ' . $this->from;
			
			if(!empty($this->join)) {
				$query .= $this->join;
				unset($this->join);
			}
			if(!empty($this->conditions)) {
				$query .= ' WHERE ' . implode(' AND ', $this->conditions);
				unset($this->conditions);
			}
			
			return $query;
		}
	}