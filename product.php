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
    $methodName = $_GET['callback'];
    $product->functionName = $methodName;
    if(json_decode(file_get_contents("php://input")) === null) {
        $result = $product->calluserfunction($methodName, '');
        print_r(json_encode($result));
        return;
    }
    $data = json_decode(file_get_contents("php://input"));
    $result = $product->calluserfunction($methodName, $data);
?>