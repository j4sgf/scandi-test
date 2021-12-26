<?php
class database{
 
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
  function get_conn(){
    return $this->conn;
  }
} 
 
?>
