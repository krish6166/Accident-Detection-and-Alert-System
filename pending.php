<?php
    // Initialize the session
    session_start();
    
    // Check if the user is logged in, if not then redirect him to login page
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: login.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table</title>
</head>

<style>
    body {
        padding: 0px;
        margin: 0;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
    }
    
    table {
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        border-collapse: collapse;
        width: 800px;
        height: 200px;
        border: 1px solid #bdc3c7;
        box-shadow: 2px 2px 12px rgba(0, 0, 0, 0.2), -1px -1px 8px rgba(0, 0, 0, 0.2);
    }
    
    tr {
        transition: all .2s ease-in;
        cursor: pointer;
    }
    
    th,
    td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }
    
    #header {
        background-color: #16a085;
        color: #fff;
    }
    
    h1 {
        font-weight: 600;
        text-align: center;
        background-color: #16a085;
        color: #fff;
        padding: 10px 0px;
    }
    
    tr:hover {
        background-color: #f5f5f5;
        transform: scale(1.02);
        box-shadow: 2px 2px 12px rgba(0, 0, 0, 0.2), -1px -1px 8px rgba(0, 0, 0, 0.2);
    }
    
    @media only screen and (max-width: 768px) {
        table {
            width: 90%;
        }
    }
</style>

<body>

    <h1>Pending Cases in <?php echo htmlspecialchars($_SESSION["username"]); ?> Police Station</h1>
    <hr>

    <table>
        <tr id="header">
            <th>Name</th>
            <th>Date</th>
            <th>Time</th>
            <th>Adress</th>
            <th>Phone</th>
            <th>Relative</th>
            <th>vehicle</th>
            <th>Injury Status</th>
            <th>Location of Accident</th>
        </tr>
        <?php
            require_once "config.php";
            // Select values from MySQL database table
            // $sql = "SELECT pid,name,adress,phone,rc1,rc2,injurystatus,location,carnumber,date,time FROM table_name";
            $sql = "SELECT `person_id`, `name`, `adress`, `phone`, `first_relative`, `second_relative`, `injury_status`,
            `vehicle_number`, `location_latitude`, `location_longitude`, `status`, `date`, `time` 
            FROM {$_SESSION["username"]} WHERE status = 0";
            $result = $conn->query($sql);
            echo "<center>";
        ?>

        <?php
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
        ?>
                <tr>
                    <td><?php echo $row["name"]; ?></td>
                    <td><?php echo $row["date"]; ?></td>
                    <td><?php echo $row["time"]; ?></td>
                    <td><?php echo $row["adress"]; ?></td>
                    <td><?php echo $row["phone"]; ?></td>
                    <td><?php echo $row["first_relative"]; ?></td>
                    <td><?php echo $row["vehicle_number"]; ?></td>
                    <td><?php echo $row["status"]; ?></td>
                    <td><?php echo $row["location_latitude"]; echo ", "; echo $row["location_longitude"]; ?></td>
                </tr>
        <?php
                }
            }  
            $conn->close();
        ?>

    </table>

</body>

</html>