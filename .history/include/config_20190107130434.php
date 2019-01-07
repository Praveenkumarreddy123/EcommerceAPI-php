<?php

class DataBaseConfig {
    public  $servername = "localhost";
    public  $username = "root";
    public  $password = "";
    public  $dbname = "ecommercedatabase";

   public function __construct() {
      
    }
  }
// class config {
//     $servername = "localhost";
//     $username = "root";
//     $password = "";
//     $dbname = "ecommercedatabase";
// }

// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "ecommercedatabase";

// // Create connection
// $conn = mysqli_connect($servername, $username, $password, $dbname);

// // Check connection
// if (!$conn) {
//     die("Connection failed: " . mysqli_connect_error());
// }
// echo "Connected successfully";
?>