<?php 	 

	class Db{
		private $dbhost = "localhost";
		private $user = "root";
		private $password = "password";
		private $database = "slim";
		private $charset = "utf8";


		public static function connect(){

			$db = new PDO("mysql:host=localhost;dbname=slim;charset=utf8",'root','password');
			$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
			return $db;	

		}


	}

