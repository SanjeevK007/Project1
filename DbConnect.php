<?php
	class DbConnect{
		private $host = 'localhost';
		private $user = 'fxynetzrst';
		private $pass = '74F7uUXN7z';
		

		public function connect(){
			try{
				$conn = new PDO('mysql:host='.$this->host.';dbname=fxynetzrst',$this->user);
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				return $conn;
			}
			catch(PDOException $e){
				echo "Database connection failed:".$e->getMessage();
			}
		}
	}
?>

