<?php
	class DbConnect{
		private $host = 'localhost';
		private $user = 'root';
		private $pass = '';
		

		public function connect(){
			try{
				$conn = new PDO('mysql:host='.$this->host.';dbname=youtube',$this->user);
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				return $conn;
			}
			catch(PDOException $e){
				echo "Database connection failed:".$e->getMessage();
			}
		}
	}
?>

