<?php
//namespace ShoeApp\Logic;

class DBConnect{
	private $servername = "localhost";
	private $username = "root";
	private $password = "";
	private $database = "shoe_db";
	private $conn = null;

	function __construct(){
		$this->conn = new \mysqli($this->servername,$this->username,$this->password,$this->database);		
	}

	function executeQuery($sql){
		if ($this->conn->connect_error) {
			die("Connection failure: ". $this->conn->connect_error);
		}
		if ($this->conn->query($sql) === TRUE) {
			echo "Database execute succeed..!";
		} else {
			echo "Error: " . $this->conn->error;
		}
	}

	function closeConn(){
		$this->conn->close();
	}
}

$dbConn = new DBConnect();
