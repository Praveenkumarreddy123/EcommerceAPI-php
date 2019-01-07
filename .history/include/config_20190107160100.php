<?php

class DataBase {
    private $servername = "127.00.2";
    private $username = "root";
    private $password = "";
    private $dbname = "api_db";
    public $conn;
    public function getConnection() {
        $this->conn = mysql_connect('127.00.2', 'root', '');
			mysql_select_db('api_db', $this->conn);
			if(mysql_errno($this->conn){
				return mysql_error($this->conn);
			}
			else{
				return $this->conn;
			}
	
    }
  }
?>