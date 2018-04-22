<?php
	
	class InsertSqlHelper
	{
		private $insert = [];
		private $select = [];
		private $from = [];
		private $join = [];
		private $conditions = [];
		private $duplicate = [];
		
		
		/**
		 * @param $table
		 * @param $colonne
		 *
		 * @return $this
		 */
		public function insert($table, $array, $value = null, $ignore = null){
			
			$this->insert = "INSERT ";
			
			if($ignore != null){
				$this->insert .= " IGNORE ";
			}
			
			$this->insert .= 'INTO '.$table.'(`'.implode('`, `',array_keys($array)).'`)';
			
			if($value != null) {
				$this->insert .= 'VALUES ("' . implode('", "', array_values($array)) . '")';
			}
			
			return $this;
		}
		
		public function select($array, $distinct = null){
			
			$this->select = " SELECT ";
			
			if($distinct != null){
				$this->select .= " DISTINCT";
			}
			
			$this->select .= '`'.implode('`, `',array_values($array)).'`';
			
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
				$this->from = $table.' AS '.$alias;
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
		 * @param $duplicate_colonne
		 *
		 * @return $this
		 */
		public function duplicate($array){
			
			$colonne_update = array_keys($array);
			$colonne_select = array_values($array);
			
			$this->duplicate = " ON DUPLICATE KEY UPDATE ";
			
			for($i = 0; $i < count($colonne_update); $i++){
				
				$this->duplicate .= "$colonne_update[$i] = $colonne_select[$i], ";
				
			}
			
			$this->duplicate = substr($this->duplicate,0,-2);
			
			return $this;
			
		}
		
		/**
		 * @return string
		 */
		public function __toString(){
			
			$query = $this->insert;
			
			if(!empty($this->select)) {
				$query .= $this->select;
				unset($this->select);
			}
			if(!empty($this->from)) {
				$query .= $this->from;
				unset($this->from);
			}
			if(!empty($this->join)) {
				$query .= $this->join;
				unset($this->join);
			}
			if(!empty($this->conditions)) {
				$query .= ' WHERE ' . implode(' AND ', $this->conditions);
				unset($this->conditions);
			}
			if(!empty($this->duplicate)) {
				$query .= $this->duplicate;
				unset($this->duplicate);
			}
			
			return $query;
		}
	}