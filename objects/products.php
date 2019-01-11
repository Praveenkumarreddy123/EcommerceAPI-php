<?php 
   class Product {
        // database connection and table name
        public $conn;
        private $table_name = "products";
        public $Datas;
        public $functionName;
        // object properties
        public $id;
        public $name;
        public $description;
        public $price;
        public $category_id;
        public $created;

        // constructor with $db as database connection
        public function __construct($db){
            $this->conn = $db;
        }
        public function calluserfunction($methodName, $data) {
            $this->Datas = $data;
            return  call_user_func(array($this, $this->functionName)); 
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
        public function create() {
            $this->name =  $this->Datas->name;
            $this->description =  $this->Datas->description;
            $this->price =  $this->Datas->price;
            $this->category_id =  $this->Datas->category_id;
            $this->created =  $this->Datas->created;

            $query = "INSERT INTO $this->table_name (name, description, price, category_id, created) VALUES ('$this->name', '$this->description', $this->price, $this->category_id, '$this->created')";
              $result = $this->conn->query($query);
              
           if($result) {
                echo '{';
                    echo '"message": "Product was created"';
                echo '}';
                return;
            }
          
        }
        public function delete() {
            if(!$this->Datas->id) {
                http_response_code(500);
                return;
            }
            $this->id = $this->Datas->id;
            $query = "UPDATE $this->table_name SET `active`= 0 WHERE  `id`= $this->id";
            $result = $this->conn->query($query);
            if($result) {
                echo '{';
                    echo '"message": "Product was Deleted"';
                echo '}';
                return;
            }
        }
   }
  
?>