<?php

class DataBase {
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "api_db";
    public $conn;
    public function getConnection() {
        echo $this->conn;
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
			if($this->conn->connect_error){
				return $this->conn->connect_error;
			}
			else{
				return $this->conn;
			}
    }
    public function method ($method) {
        if($method === 'POST') {
            return 1;
        } else if($method === 'GET') {
            return 2;
        }
    }
  }
?>