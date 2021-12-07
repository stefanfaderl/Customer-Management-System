<?php
require_once 'includes/dbh.inc.php';
session_start();
foreach ($_POST as $entry) {
    if ($entry > 0) {
        $sql = "DELETE FROM customers WHERE customersId=$entry;";
        if ($conn->query($sql) === TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    }
}

header("location: dashboard.php");
exit();

?>

</body>

</html>


















<?php
// $entry = intval($entry);
// var_dump($entry);
?>