<?php

class DataBase {
    private $servername = "127.00.2";
    private $username = "root";
    private $password = "";
    private $dbname = "api_db";
    public $conn;
    public function getConnection() {
        $this->conn = mysql_connect($this->servername, $this->username, $this->password);
			mysql_select_db($this->db_name, $this->conn);
			if(mysql_errno($this->db_conn){
				return mysql_error($this->db_conn);
			}
			else{
				return $this->db_conn;
			}
	
    }
  }
?>