<?php
include_once 'header.php';
require_once 'includes/dbh.inc.php';

//  var_dump($_POST['customerID']); 
$id = $_POST['customerID'];
$sql = "SELECT * FROM customers WHERE customersId=$id;";

$result =  $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        //var_dump($row);
        echo $row['customersName'];
    }
}
// print_r($result);



//header("location: edit.php");
exit();

?>


</body>

</html>