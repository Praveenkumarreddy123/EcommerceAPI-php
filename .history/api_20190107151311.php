<?php
    include_once('include/config.php');
    include_once('objects/products.php');
    $db = new DataBase();
    $product = new Product($db);
    echo "<pre>";
    print_r($product);
    echo "</pre>";
?>