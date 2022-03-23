<?php

/* $serverName = "localhost:3309";
$dbUsername = "root";
$dbPassword = "";
$dbName = "kundenverwaltungssystem";
// mySQLi is up to date 
$conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName); */

//Get Heroku ClearDB connection information
$cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$cleardb_server = $cleardb_url["eu-cdbr-west-02.cleardb.net"];
$cleardb_username = $cleardb_url["b7830bd54b1c85"];
$cleardb_password = $cleardb_url["8ff41e9b"];
$cleardb_db = substr($cleardb_url["mysql://b7830bd54b1c85:8ff41e9b@eu-cdbr-west-02.cleardb.net/heroku_1f33d5651ee0787?reconnect=true"], 1);
$active_group = 'default';
$query_builder = TRUE;
// Connect to DB
$conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>