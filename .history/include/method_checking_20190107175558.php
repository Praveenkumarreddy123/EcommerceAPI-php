<?php
    public function method ($method) {
        if($method === 'POST') {
            return 1;
        } else if($method === 'GET') {
            return 2;
        }
    }
 ?>