<?php
//namespace Logic\DataAccess;

class DBConnect{
	private $servername = "localhost";
	private $username = "root";
	private $password = "";
	private $database = "shoe_db";
	private $conn = null;
	public $name = "shoeProject";
	private static $_instance;
	
	function __construct(){
		$this->conn = new \mysqli($this->servername,$this->username,$this->password,$this->database);		
	}

	function executeQuery($sql){
		$result = null;
		if ($this->conn->connect_error) {
			die("Connection failure: ". $this->conn->connect_error);
		}
		if ($result = $this->conn->query($sql)) {
			// show bootstrap alert
			return $result;
		} else {
			echo "Error: " . $this->conn->error;
		}
		return $result;
	}

	function closeConn(){
		$this->conn->close();
	}

	function getName(){
		return $this->name;
	}
}

$dbConn = new DBConnect();
echo $dbConn->getName();
echo " database connected...!";

