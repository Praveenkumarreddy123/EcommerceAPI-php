<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    header("Access-Control-Allow-Methods: GET");
    header("Access-Control-Allow-Credentials: true");
    header('Content-Type: application/json');
    
    
    include_once('include/config.php');
    include_once('objects/products.php');
    $db = new DataBase();
    $product = new Product($db->getConnection());
    // $data =  $product->read();
     $ob = json_decode(file_get_contents("php://input"));
    if($ob === null) {
        http_response_code(500)
    }
?>