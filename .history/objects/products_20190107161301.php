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
           $query = "SELECT * FROM $this->table_name";
           $result = mysql_query($query, $this->conn);
           print_r($result);
        }
   }
?>