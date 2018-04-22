<?php
	/**
	 * Created by Erwan.
	 * Date: 18/01/2018
	 * Time: 10:03
	 */

	class EmailHelper
	{
		
		private $from;
		private $to = [];
		private $objet;
		private $message;
		private $send;
		
		
		/**
		 * @param $email
		 *
		 * @return $this
		 */
		public function getFrom ($email)
		{
			$this->from = $email;
			return $this;
		}
		
		/**
		 * @return $this
		 */
		public function getTo ()
		{
			$this->to = func_get_args();
			return $this;
		}
		
		/**
		 * @param $objet
		 *
		 * @return $this
		 */
		public function getObjet ($objet)
		{
			$this->objet = $objet;
			return $this;
		}
		
		/**
		 * @param $message
		 *
		 * @return $this
		 */
		public function getMessage ($message)
		{
			$this->message = $message;
			return $this;
		}
		
		/**
		 * Fonction envoie
		 */
		public function send ()
		{
			
			$to = implode(', ', $this->to);
			
			$entete  = "From: $this->from \n";
			$entete .= "Reply-to: $this->from \n";
			$entete .= "X-Priority: 3 \n";
			$entete .= "MIME-Version: 1.0 \n";
			$entete .= "Content-type: text/html; charset=utf-8 \n";
			$entete .= " \n";
			
			$this->send = mail($to, $this->objet, $this->message, $entete);
			
			return $this;
		}
		
	}