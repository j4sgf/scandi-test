<?php

class Database
{
    public $host = "localhost";
    public $uname = "root";
    public $pass = "root";
    public $db = "webstore";

    public function __construct()
    {
        $conn = new mysqli($this->host, $this->uname, $this->pass, $this->db);
        $this->conn = $conn;

        if ($conn) {
            echo "Connection Success.";
        } else {
            echo "Connection Failed";
        }
    }
    public function getConn()
    {
        return $this->conn;
    }
}
