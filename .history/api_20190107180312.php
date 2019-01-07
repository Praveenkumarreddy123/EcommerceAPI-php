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
    $method = $db->methodeechecking($_SERVER['REQUEST_METHOD']);

   // $method = $db->method($_SERVER['']);
    // $data =  $product->read();
    // $ob = json_decode(file_get_contents("php://input"));
    if($method === 1) {
        if(json_decode(file_get_contents("php://input")) === null) {
            http_response_code(500);
        } else {
            print_r(json_encode($product->read()));
        }
    }
?>