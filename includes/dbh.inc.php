<?php

 $serverName = "localhost";
 $dbUsername = "root";
 $dbPassword = "";
 $dbName = "nerdy_gadgets_start";

 $conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);
 $pdo = new PDO("mysql:host=" . $serverName . ";dbname=" . $dbName . ';charset=utf8', $dbUsername, $dbPassword);


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

