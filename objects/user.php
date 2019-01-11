<?php
   include_once('country.php');
   include_once('state.php');
   include_once('city.php');
   class User {
        // database connection and table name
        public $conn;
        private $table_name = "users";
        public $Datas;
        public $functionName;
        public $country;
        public $state;
        public $city;
        // object properties

        // constructor with $db as database connection
        public function __construct($db){
            $this->conn = $db;
            $this->country = new Country($db);
            $this->state = new State($db);
            $this->city = new City($db);
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
        public function getcities($state_id, $countries_id) {
            $array = array();
            $query = "SELECT countries.id as country_id , countries.name as country_name, states.id as state_id, states.name as state_name, cities.id as city_id, cities.name as city_name FROM countries INNER JOIN states INNER JOIN cities ON countries.id = $countries_id && states.id = $state_id && cities.state_id = $state_id";
            $result = $this->conn->query($query);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                 $array[] = $row;
                }
            }
            return $array;
        }
        public function getstates($country_id) {
            $array = array();
            $query = "SELECT id, name, country_id FROM states WHERE country_id = $country_id" ;
            $result = $this->conn->query($query);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                 $array[] = $row;
                }
            }
            return $array;
        }
        public function places() {
            $test = $this->getcities('1581', '101');
            $country = array();
            for($i=0; $i<count($test); $i++){
               // print_r($test[$i]['city_name']);
                $country[] = array('country_id' => $test[$i]['country_id'], 'country_name' => $test[$i]['country_name']);
            }
            print_r( $country);
        }
   }
  
?>