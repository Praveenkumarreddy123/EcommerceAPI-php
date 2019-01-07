<?php
    include_once('include/config.php');
    $filename = pathinfo('filename.md.txt', PATHINFO_FILENAME);
    $database = new DataBaseConfig ();
    echo"<pre>";
    print_r($_POST);
    echo"</pre>";
    print_r($database ->login());  
?>