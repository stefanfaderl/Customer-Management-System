<?php
include_once 'header.php';
require_once 'dbh.inc.php';
$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM customers WHERE userid='$id'");
$row = mysqli_fetch_array($query);


include('conn.php');
$id = $_GET['id'];

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];

mysqli_query($conn, "UPDATE customers SET firstname='$firstname', lastname='$lastname' WHERE userid='$id'");

header("location: ../dashboard.php");
exit();

?>
</body>

</html>