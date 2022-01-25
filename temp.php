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
    
    // Get date and time variables
    date_default_timezone_set('Asia/Kolkata');  
    $d = date("Y-m-d");
    $t = date("H:i:s");
        
    // If values send by NodeMCU are not empty then insert into MySQL database table
    if(!empty($_POST['sendval']) && !empty($_POST['sendval2']) ){

        // Retrieve data from NodeMcu
        $val1 = $_POST['person_id'];
        $val2 = $_POST['name'];
        
        $val3 = "Beed maharshtra";
        $val4 = "8180976176";
        $val5 = "9767558161";
        $val6 = "9860514074";
        $val7 = "1";
        $val8 = "MH23AL100";
        $val9 = "18.7652";
        $val10 = "76.3214";
        $val11 = "0";
 
        $sql = "INSERT INTO `all_accidents`(`person_id`, `name`, `adress`, `phone`, `first_relative`, 
        `second_relative`, `injury_status`, `vehicle_number`, `location_latitude`, `location_longitude`, 
        `status`, `date`, `time`) VALUES ('".$val1."','".$val2."','".$val3."','".$val4."','".$val5."',
        '".$val6."','".$val7."','".$val8."','".$val9."','".$val10."','".$val11."','".$d."','".$t."')";

        if ($conn->query($sql) === TRUE) {
            echo "Values inserted in MySQL all_accidents table.";
            echo "<br>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            echo "<br>";
        }

    }
    else {
        echo "Data not received from NodeMcu";
        echo "<br>";
    }

    $conn->close();
?>

