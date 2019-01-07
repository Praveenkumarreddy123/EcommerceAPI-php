<?php

class DataBaseConfig {
   public function __construct() {
        // Create connection
        public  $servername = "localhost";
        public  $username = "root";
        public  $password = "";
        public  $dbname = "ecommercedatabase";
        $conn = mysqli_connect($servername, $username, $password, $dbname);

        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        echo "Connected successfully";
    }
  }
?>