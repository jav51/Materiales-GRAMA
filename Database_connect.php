<?php
$servername = "107.180.6.39";
$username = "materialesgrama";
$password = "Materiales-grama";

try {
    $conn = new PDO("mysql:host=$servername;dbname=grama", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }




 ?>
