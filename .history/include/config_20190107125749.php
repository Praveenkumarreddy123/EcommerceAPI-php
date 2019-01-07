<?php

class config {
    public $comp;
    public $color = 'beige';
    public $hasSunRoof = true;
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ecommercedatabase";  

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
?>