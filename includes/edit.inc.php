<?php


$nameofcontact = $_POST["nameofcontact"];
$emailofcontact = $_POST["emailofcontact"];
$contactName = $_POST["contactpartner"];
$phonenumber = $_POST["phonenumber"];
$locationName = $_POST["location"];

if (isset($_POST["editcontact"])) { // doesn't work
    echo "It work´s!";

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';
    updateCustomer($conn, $nameofcontact, $emailofcontact, $contactName, $phonenumber, $locationName);

    // header("location: ../edit.php");
    exit();
}

?>

<?php

/* $sql = "UPDATE customers SET firstname='$firstname', lastname='$lastname' WHERE userid='$id;'"; */
/* noch ohne validierung */
?>