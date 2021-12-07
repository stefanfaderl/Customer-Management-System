<?php
include_once 'header.php';
require_once 'includes/dbh.inc.php';
//  var_dump($_POST['customerID']); 
$id = $_POST['customerID']; //prepair statment noch einbauen überall // customerID = z.B. 5 
$sql = "SELECT * FROM customers WHERE customersId=$id;";
$nameofcontact;
$emailofcontact;
$contactName;
$phonenumber;
$locationName;

$result =  $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        //var_dump($row);
        // echo $row['customersName'];
        $nameofcontact = $row['customersName'];
        $emailofcontact = $row['customersEmail'];;
        $contactName = $row['customersContactName'];;
        $phonenumber = $row['customersPhonenumber'];;
        $locationName = $row['customersLocationName'];;
    }
    echo "
    <article>
    <section class='contactForm'>
        <form action='includes/edit.inc.php' method='post'>
            <h1>Edit customer</h1>
            <input type='text' name='nameofcontact' placeholder='$nameofcontact'>
            <input type='text' name='emailofcontact' placeholder='$emailofcontact'>
            <input type='text' name='contactpartner' placeholder='$contactName'>
            <input type='text' name='phonenumber' placeholder='$phonenumber'>
            <input type='text' name='location' placeholder='$locationName'>
            <button type='submit' name='editcontact'>Edit contact</button>
        </form></section></article>";
}
// print_r($result);



//header("location: edit.php");
exit();

?>


</body>

</html>