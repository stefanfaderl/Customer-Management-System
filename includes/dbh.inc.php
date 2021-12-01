<?php

$serverName = "localhost:3309";
$dbUsername = "root";
$dbPassword = "";
$dbName = "phpprojectloginsystem";
// mySQLi is up to date 
$conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>

