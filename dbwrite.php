<?php

    require_once "config.php";
    
    // Get date and time variables
    date_default_timezone_set('Asia/Kolkata');  
    $d = date("Y-m-d");
    $t = date("H:i:s");
        
    // If values send by NodeMCU are not empty then insert into MySQL database table
    if(!empty($_POST['sendval']) && !empty($_POST['sendval2']) ){

        // Retrieve data from NodeMcu
        $val1 = $_POST['person_id'];
        $val2 = $_POST['name'];
        $val3 = $_POST['adress'];
        $val4 = $_POST['phone'];
        $val5 = $_POST['first_relative'];
        $val6 = $_POST['second_relative'];
        $val7 = $_POST['injury_status'];
        $val8 = $_POST['vehicle_number'];
        $val9 = $_POST['location_latitude'];
        $val10 = $_POST['location_longitude'];
        $val11 = $_POST['status'];

        require_once "getLocation.php";

        // Update your tablename here
        // $sql = "INSERT INTO table_name (val, val2, Date, Time) VALUES ('".$val."','".$val2."', '".$d."', '".$t."')"; 
        $sql = "INSERT INTO `all_accidents`(`person_id`, `name`, `adress`, `phone`, `first_relative`, 
        `second_relative`, `injury_status`, `vehicle_number`, `location_latitude`, `location_longitude`, 
        `status`, `date`, `time`) VALUES ('".$val1."','".$val2."','".$val3."','".$val4."','".$val5."',
        '".$val6."','".$val7."','".$val8."','".$val9."','".$val10."','".$val11."','".$d."','".$t."')";

        $sql1 = "INSERT INTO `{$district_name}`(`person_id`, `name`, `adress`, `phone`, `first_relative`, 
        `second_relative`, `injury_status`, `vehicle_number`, `location_latitude`, `location_longitude`, 
        `status`, `date`, `time`) VALUES ('".$val1."','".$val2."','".$val3."','".$val4."','".$val5."',
        '".$val6."','".$val7."','".$val8."','".$val9."','".$val10."','".$val11."','".$d."','".$t."')";

        if ($conn->query($sql) === TRUE) {
            // echo "Values inserted in MySQL all_accidents table.";
            echo "<br>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            echo "<br>";
        }

        if ($conn->query($sql1) === TRUE) {
            // echo "Values inserted in MySQL district table.";
            echo "<br>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            echo "<br>";
        }
    }

    $conn->close();
?>

