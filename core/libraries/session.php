<?php 
	include_once("interfaces/Session.php");
	/**
	 * 
	 */

	class Session_ implements session
	{
		// session sets in this array
		private $session=array();

		public function __construct(){
			session_start();
		}

		public function setUserSession(){

			// check args is seted or not and is setted 2 just
			if(func_num_args() > 0 && func_num_args() == 2)
			{
				$data = func_get_args();

				// excecute session

				$_SESSION[$data[0]] = $data[1];
				$this->{$data[0]} = $data[1];
				array_push($this->session, $data[0]);
			}else
			{
				// error code here
			}


		}

		// to get array of sessions names set
		public function getSessionSet(){
			return $this->session;
		}

		// to unset sessions in server
		public function emptyUserSession(){
			session_unset();
		}

	}

?>