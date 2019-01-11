<?php

class DataBase {
    private $servername = "127.0.0.1";
    private $username = "root";
    private $password = "";
    private $dbname = "api_db";
    public $conn;
    public function getConnection() {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
			if($this->conn->connect_error){
				return $this->conn->connect_error;
			}
			else{
				return $this->conn;
			}
    }
    public function methodeechecking ($method) {
        if($method === 'POST') {
            return 1;
        } else if($method === 'GET') {
            return 2;
        }
    }
  }
?>