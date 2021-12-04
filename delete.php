<?php
$id = $_GET['id'];
require_once 'dbh.inc.php';
mysqli_query($conn, "DELETE FROM customers WHERE userid='$id'");
header("location: dashboard.php");
exit();
