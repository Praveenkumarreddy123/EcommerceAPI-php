<?php

class DataBase {
    private $servername = "127.00.2";
    private $username = "root";
    private $password = "";
    private $dbname = "api_db";
    public $conn;
    public function getConnection() {
        $this->db_conn = mysql_connect('127.00.2', 'root', '');
			mysql_select_db('api_db', $this->db_conn);
			if(mysql_errno($this->db_conn){
				return mysql_error($this->db_conn);
			}
			else{
				return $this->db_conn;
			}
	
    }
  }
?>