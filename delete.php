<?php
require_once 'includes/dbh.inc.php';
session_start();
$id = implode("", $_POST);
$sql = "DELETE FROM customers WHERE customersId=$id;";
$stmt = mysqli_stmt_init($conn); // statement
if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: dashboard.php?error=stmtfailed");
    exit();
}

mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
header("location: dashboard.php");
exit();


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