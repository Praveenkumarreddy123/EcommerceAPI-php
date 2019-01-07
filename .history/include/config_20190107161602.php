<?php

class DataBase {
    private $servername = "127.00.2";
    private $username = "root";
    private $password = "";
    private $dbname = "api_db";
    public $conn;
    public function getConnection() {
        $this->conn = new mysqli($servername, $username, $password, $dbname);
			if($this->conn->connect_error){
				return mysql_error($this->conn);
			}
			else{
				return $this->conn;
			}
    }
    public function query($sql){
        $this->_query = mysql_query($sql, $this->conn);
        $this->_numRows = mysql_num_rows($this->conn);
        $this->_fetchAll = mysql_fetch_array($this->conn);
    }
  }
?>