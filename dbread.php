<?php

    require_once "config.php";

    // Select values from MySQL database table
    // $sql = "SELECT pid,name,adress,phone,rc1,rc2,injurystatus,location,carnumber,date,time FROM table_name";
    $sql = "SELECT `person_id`, `name`, `adress`, `phone`, `first_relative`, `second_relative`, `injury_status`,
    `vehicle_number`, `location_latitude`, `location_longitude`, `status`, `date`, `time` 
    FROM `all_accidents` WHERE 1";
    $result = $conn->query($sql);
    echo "<center>";

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<strong> person_id:</strong> " . $row["person_id"]. " 
            &nbsp <strong>name:</strong> " . $row["name"]. "
            &nbsp <strong>adress:</strong> " . $row["adress"]. "
            &nbsp <strong>phone:</strong> " . $row["phone"]. "
            &nbsp <strong>first_relative:</strong> " . $row["first_relative"]. "
            &nbsp <strong>second_relative:</strong> " . $row["second_relative"]. "
            &nbsp <strong>injury_status:</strong> " . $row["injury_status"]. "
            &nbsp <strong>vehicle_number:</strong> " . $row["vehicle_number"]. "
            &nbsp <strong>location_latitude:</strong> " . $row["location_latitude"]. "
            &nbsp <strong>location_longitude:</strong> " . $row["location_longitude"]. "
            &nbsp <strong>status:</strong> " . $row["status"]. "
            &nbsp <strong>date:</strong> " . $row["date"]."
            &nbsp <strong>time:</strong>" .$row["time"]. "<p>";
        }
    } 
    else {
        echo "0 results";
    }

    echo "</center>";
    $conn->close();
?>



