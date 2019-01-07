<?php

class DataBase {
    private $servername = "127.00.2";
    private $username = "root";
    private $password = "";
    private $dbname = "api_db";
    public $conn;
    public function getConnection() {
       // $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
			// if($this->conn->connect_error){
			// 	return $this->conn->connect_error;
			// }
			// else{
			// 	return $this->conn;
			// }
    }
  }
?>