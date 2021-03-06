<?php 
   class Country {
        // database connection and table name
        public $conn;
        private $table_name = "countries";
        public $Datas;
        public $functionName;
        // object properties
        
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
   }
  
?>