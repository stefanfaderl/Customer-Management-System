<?php
include_once 'header.php';
require_once 'includes/dbh.inc.php';
$id = $_POST['customerID'];
$sql = "SELECT * FROM customers WHERE customersId=$id;";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: addcontact.php?error=stmtfailed");
    exit();
}
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);

$nameofcontact;
$emailofcontact;
$contactName;
$phonenumber;
$locationName;
$customerId = $id;

$result =  $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $nameofcontact = $row['customersName'];
        $emailofcontact = $row['customersEmail'];;
        $contactName = $row['customersContactName'];;
        $phonenumber = $row['customersPhonenumber'];;
        $locationName = $row['customersLocationName'];;
    }
    echo
    "<article>
    <section class='contactForm'>
        <form action='includes/edit.inc.php' method='post'>
            <h1>Edit customer</h1>
            <input type='text' name='customerid' placeholder='$customerId'>
            <input type='text' name='nameofcontact' placeholder='$nameofcontact'>
            <input type='text' name='emailofcontact' placeholder='$emailofcontact'>
            <input type='text' name='contactpartner' placeholder='$contactName'>
            <input type='text' name='phonenumber' placeholder='$phonenumber'>
            <input type='text' name='location' placeholder='$locationName'>
            <button type='submit' name='editcontact'>Edit contact</button>
        </form>
    </section>
    </article>";
}
exit();

?>


</body>

</html>