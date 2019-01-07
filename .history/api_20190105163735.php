<?php

session_start();

print_r($_GET);
$cookie_name = "login_true";
$cookie_value = session_id();
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
$count = 0;
if(isset($_COOKIE['login_true'])){
    $count++;
}
?>