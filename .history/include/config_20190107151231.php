<?php

class DataBase {
    private $servername = "127.0.0.2";
    private $username = "root";
    private $password = "";
    private $dbname = "api_db";
    public $conn;
   public function getConnection() {
        // Create connection
       
        $conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);

        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

       // echo true;
    }
  }
?>