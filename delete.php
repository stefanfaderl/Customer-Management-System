<?php
include_once 'header.php';
require_once 'includes/dbh.inc.php';
$actualUsername = $_SESSION["username"];

foreach ($_POST as $entry) {
    if ($entry > 0) {
        $sql = "DELETE FROM customers WHERE customersId=$entry ;"; // AND customersCreatedBy=$actualUsername doesn't work 
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: addcontact.php?error=stmtfailed"); 
            exit();
        }
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
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