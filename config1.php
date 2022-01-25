<?php

    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'id18314700_root');
    define('DB_PASSWORD', '\+!8ueXXp(G@N5cU');
    define('DB_NAME', 'id18314700_demo');

    
    $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    
    // Check connection
    if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
?>