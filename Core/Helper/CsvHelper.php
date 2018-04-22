<?php
	/**
	 * Created by Erwan.
	 * Date: 18/01/2018
	 * Time: 10:30
	 */
	
	class CsvHelper
	{
		public function FOpen($file){
			
			$fopen = fopen($file, "r");
			return $fopen;
		}
		
		public function FGetCsv($csv){
			
			$fgetcsv = fgetcsv($csv, 10000, ";");
			return $fgetcsv;
		}
		
		public function FClose($csv){
			fclose($csv);
		}
	}