<?php

class DataBase {
    private $servername = "127.00.2";
    private $username = "root";
    private $password = "";
    private $dbname = "api_db";
    public $conn;
    public function getConnection() {
        $this->db_conn = mysql_connect($db_host, $db_user, $db_pass);
        mysql_select_db($db_name, $this->db_conn);
        if(mysql_errno($this->db_conn){
            return mysql_error($this->db_conn);
        }
        else{
            return $this->db_conn;
        }
	
    }
  }
?>