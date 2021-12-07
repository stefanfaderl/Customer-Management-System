<?php
require_once 'includes/dbh.inc.php';
session_start();
// var_dump($_POST);
foreach ($_POST as $entry) {
    // $entry = intval($entry);
    var_dump($entry);
    if($entry > 0){
        $sql = "DELETE FROM customers WHERE customersId=$entry;";
        if ($conn->query($sql) === TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    }
    // $stmt = mysqli_stmt_init($conn); // statement
    // if (!mysqli_stmt_prepare($stmt, $sql)) {
    //     var_dump(mysqli_stmt_prepare($stmt, $sql));
    //     // header("location: addcontact.php?error=stmtfailed");
    //     // exit();
    // }
}
// $id = implode("", $_POST);

mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
header("location: dashboard.php");
exit();

?>

</body>

</html>


















<?php
// var_dump($_POST);
/* $id = var_dump($_POST);
echo $id;
echo print_r ($id);
 */

/* if (isset($_POST[''])) {
    echo $_POST[''] . "<br>";
} */

/* foreach (count_chars($id, 1) as $i => $val) {
    echo "There were $val instances of \"", chr($i), "\" in the string. <br>";
} */
?>