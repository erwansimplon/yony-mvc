<?php
	
	class Database
	{
		private $db_name;
		private $db_user;
		private $db_pass;
		private $db_host;
		
		private $mysql;
		private $sqlsrv;
		private $odbc;
		
		
		/**
		 * Database constructor.
		 *
		 * @param        $db_name
		 * @param string $db_user
		 * @param string $db_pass
		 * @param string $db_host
		 */
		public function __construct($db_name, $db_host = false, $db_user, $db_pass)
		{
			$this->db_name = $db_name;
			$this->db_user = $db_user;
			$this->db_pass = $db_pass;
			
			if($db_host != false){
				$this->db_host = $db_host;
			}
		}
		
		/**
		 * @return \PDO mysql
		 */
		public function getMysql ()
		{
			if ($this->mysql === null){
				$mysql = new PDO('mysql:host='.$this->db_host.';dbname='.$this->db_name, $this->db_user, $this->db_pass);
				$mysql->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$this->mysql = $mysql;
			}
			return $this->mysql;
		}
		
		/**
		 * @return \PDO sqlsrv
		 */
		public function getSqlServer ()
		{
			if ($this->sqlsrv === null){
				$sqlsrv = new PDO('sqlsrv:Server='.$this->db_host.';Database='.$this->db_name, $this->db_user, $this->db_pass);
				$sqlsrv->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$this->sqlsrv = $sqlsrv;
			}
			return $this->sqlsrv;
		}
		
		/**
		 * @return \PDO odbc
		 */
		public function getOdbc ()
		{
			if ($this->odbc === null) {
				$odbc = new PDO('odbc:'.$this->db_name, $this->db_user, $this->db_pass);
				$odbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$this->odbc = $odbc;
			}
			
			return $this->odbc;
		}
		
		/**
		 * @param $bdd
		 *
		 * @return \PDO|string
		 */
		public function switchBdd($bdd){
			
			switch ($bdd){
				
				case 'mysql':
					$database = $this->getMysql();
					break;

				case 'sql_server':
					$database = $this->getSqlServer();
					break;

				case 'odbc':
					$database = $this->getOdbc();
					break;
				
				default:
					$database = '';
			}
			
			return $database;
			
		}
		
		/**
		 * @param      $statement
		 * @param bool $singleResult
		 *
		 * @return array|mixed
		 */
		public function query($bdd, $statement, $singleResult = false)
		{
			$database = $this->switchBdd($bdd);
			
			$requete = $database->query($statement);
			$requete->setFetchMode(PDO::FETCH_OBJ);
			
			if($singleResult){
				$data = $requete->fetch();
			}
			else{
				$data = $requete->fetchAll();
			}
			
			return $data;
			
		}
		
		/**
		 * @param      $statement
		 * @param      $parametres
		 * @param bool $singleResult
		 *
		 * @return array|mixed
		 */
		public function prepare ($bdd, $statement, $parametres = false, $singleResult = false)
		{
			$database = $this->switchBdd($bdd);
			
			$requete = $database->prepare($statement);
			$requete->setFetchMode(PDO::FETCH_OBJ);
			
			if($parametres) {
				$requete->execute($parametres);
			} else{
				$requete->execute();
			}
			
			if($singleResult){
				$data = $requete->fetch();
			}
			else{
				$data = $requete->fetchAll();
			}
			
			return $data;
		}
		
		/**
		 * @param $statement
		 *
		 * @return int
		 */
		public function exec ($bdd, $statement)
		{
			$database = $this->switchBdd($bdd);
			
			$requete = $database->exec($statement);
			
			return $requete;
		}
		
	}