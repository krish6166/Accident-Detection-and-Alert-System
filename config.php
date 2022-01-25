<?php

    $host = "localhost";		
    $dbname = "id18314700_demo";         
    $username = "id18314700_root";		    
    $password = "\+!8ueXXp(G@N5cU";	   

    $conn = new mysqli($host, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    else { echo "Connected to mysql database. "; echo "<br>";}

?>