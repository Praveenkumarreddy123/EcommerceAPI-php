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
           $array = array();
           $query = "SELECT * FROM $this->table_name";
           $result = $this->conn->query($query);
           if ($result->num_rows > 0) {
               while($row = $result->fetch_assoc()) {
                $array[] = $row;
               }
           }
          return $array;
        }
        public function read() {
           // $query = "SELECT * FROM $this->table_name";
        }
   }
?>