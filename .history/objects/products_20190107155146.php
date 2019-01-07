<?php 
   class Product {
        // database connection and table name
        public $conn;
        private $table_name = "products";

        // object properties
        public $id;
        public $name;
        public $description;
        public $price;
        public $category_id;
        public $category_name;
        public $created;

        // constructor with $db as database connection
        public function __construct($db){
            $this->conn = $db;
        }
        public function read() {
            $query = "SELECT * from $this->table_name";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            // $result = $this->conn->query($query);
            // print_r($result);
            print_r( $this->conn);
        }
   }
?>