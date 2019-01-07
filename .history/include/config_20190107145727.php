<?php

class DataBaseConfig {
   public function __construct() {
        // Create connection
        $servername = "127.0.0.2";
        $username = "root";
        $password = "";
        $dbname = "api_db";
        $conn = mysqli_connect($servername, $username, $password, $dbname);

        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
    }
    public function login() {
        echo "login call";
    }
  }
?>