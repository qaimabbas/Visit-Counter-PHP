<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "counter";
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    $query = "UPDATE Counter SET visits = visits+1 WHERE id = 1";
    $conn->query($query);

    $query2 = "SELECT visits FROM Counter WHERE id = 1";
    $result = $conn->query($query2);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $visits = $row["visits"];
        }
    } else {
        echo "didnt found any result";
    }
    
    $conn->die();
?>

<!doctype html>  
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Visitor counter PHP </title>
    </head>
    <body>
        Visits: <?php print $visits; ?>

    </body>
</html>
