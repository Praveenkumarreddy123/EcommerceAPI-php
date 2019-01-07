<?php
    include_once('include/config.php');
    var_dump(basename('api.php', '.php'));
    $database = new DataBaseConfig ();
    echo"<pre>";
    print_r($_POST);
    echo"</pre>";
    print_r($database ->login());  
?>