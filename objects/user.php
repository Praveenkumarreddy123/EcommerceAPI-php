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
        public $username;
        public $password;
        public $email;
        public $created_at;
        public $phonenumber;
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
        public function loginUser() {
            $array = array();
            $this->username = $this->Datas->username;
            $this->password = $this->Datas->password;
            $query = "SELECT id,first_name, last_name,email,phonenumber,city, state, country, pincode  FROM $this->table_name WHERE username = '$this->username' && password = '$this->password'";
            $result = $this->conn->query($query);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                 $array[] = $row;
                }
            }
            print_r(json_encode($array));
        }
        public function RegisterUser() {
            $array = array();
            $this->username = $this->Datas->username;
            $this->password = $this->Datas->password;
            $this->email = $this->Datas->email;
            $this->created_at = $this->Datas->created_at;
            $this->phonenumber = $this->Datas->phonenumber;
            $query = "INSERT INTO $this->table_name (username, password, created_at, email, phonenumber ) VALUES ('$this->username', '$this->password', '$this->created_at', '$this->email', '$this->phonenumber')";
            $result = $this->conn->query($query);
            if($result) {
                echo '{';
                    echo '"message": "1"';
                echo '}';
                return;
            } else {
                echo '{';
                    echo '"message": "0"';
                echo '}';
                return;
            }
        }
        public function getcities($state_id, $countries_id) {
            $array = array();
            $query = "SELECT cities.id  , cities.name   FROM countries INNER JOIN states INNER JOIN cities ON countries.id = $countries_id && states.id = $state_id && cities.state_id = $state_id";
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
        public function getcountries($country_id) {
            $array = array();
            $query = "SELECT id, name, iso2, iso3, capital, currency  FROM countries" ;
            $result = $this->conn->query($query);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                 $array[] = $row;
                }
            }
            return $array;
        }
        public function places() {
            $place = $this->getcountries('101');
            $placess = array();
            for($country=0; $country<count($place); $country++){
                $placess[] = array('country_id' => $place[$country]['id'], 'country_name' => $place[$country]['name'], 'iso2' => $place[$country]['iso2'], 'iso3' => $place[$country]['iso3'], 'capital' => $place[$country]['capital'], 'currency' => $place[$country]['currency']);
                $statearry = array();
                $getstates = $this->getstates($place[$country]['id']);
                for($state=0; $state<count($getstates); $state++){
                    $statearry[$state]= array('state_id' => $getstates[$state]['id'], 'state_name' => $getstates[$state]['name']);
                    $cityarry = array();
                    $getcities = $this->getcities($getstates[$state]['id'], $place[$country]['id']);
                    for($city=0; $city<count($getcities); $city++){
                        $cityarry[$city]= array('city_id' => $getcities[$city]['id'] ,'city_name' => $getcities[$city]['name']);
                    }
                    $statearry[$state]['cities'] = $cityarry;
                }
                $placess[$country]['states'] =  $statearry;
            }
            return $placess;
        }
   }
  
?>