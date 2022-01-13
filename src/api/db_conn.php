<?php
class Database{
 
	var $host = "localhost";
	var $uname = "root";
	var $pass = "root";
	var $db = "webstore";
 
	function __construct(){
		$conn = new mysqli($this->host, $this->uname, $this->pass, $this->db);
    	$this->conn = $conn;
 
		if($conn){
			echo "Connection Success.";
		}else{
			echo "Connection Failed";
		}
	}
  function getConn(){
    return $this->conn;
  }
} 
 
?>
