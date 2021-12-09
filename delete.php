<?php
include_once 'header.php';
require_once 'includes/dbh.inc.php';
$actualUsername = $_SESSION["username"];

foreach ($_POST as $test) {
    if ($test > 0) {
        $sql = "SELECT customersCreatedBy FROM customers WHERE customersId=$test ;"; //customersId=$test
        // var_dump($query);
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: addcontact.php?error=stmtfailed");
            exit();
        }
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // echo $row["customersCreatedBy"];
                if ($row["customersCreatedBy"] == $actualUsername) {
                    foreach ($_POST as $entry) {
                        if ($entry > 0) {
                            $sql = "DELETE FROM customers WHERE customersId=$entry ;";
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
                } else {
                    echo "<h5>Not ALLOWED to delete this customer!</h5>";
                    // header("location: dashboard.php");
                }
            }
        }
    }
}
exit();

?>

</body>

</html>









<!-- 
- Wenn alle ausgewählt & einer dabei ist der von einem created wurde löscht er tzd. alle
- Einzeln funktionierts 
 -->












<?php
// $entry = intval($entry);
// var_dump($entry);
?>