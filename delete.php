<?php
$id = $_GET['id'];
require_once 'includes/dbh.inc.php';





$sql = "SELECT * FROM customers;";
$result = $conn->query($sql);

//'input:checkbox'
header("location:  dashboard.php");
exit();
?>


</body>

</html>