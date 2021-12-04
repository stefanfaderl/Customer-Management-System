<?php
include('conn.php');
$id = $_GET['id'];

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];

mysqli_query($conn, "UPDATE customers SET firstname='$firstname', lastname='$lastname' WHERE userid='$id'");

header("location: ../dashboard.php");
exit();
