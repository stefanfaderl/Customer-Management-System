<?php
session_start(); 

$customerid = $_POST["customerid"];
$nameofcontact = $_POST["nameofcontact"];
$emailofcontact = $_POST["emailofcontact"];
$contactName = $_POST["contactpartner"];
$phonenumber = $_POST["phonenumber"];
$locationName = $_POST["location"];

// var_dump($nameofcontact);
// echo $nameofcontact;
/* $array = ($_POST);
$comma_separated = implode(",", $array);
echo $comma_separated; // lastname,email,phone */


if (isset($_POST["editcontact"])) { // doesn't work
    /*     echo $nameofcontact;
    echo $emailofcontact;
    echo $contactName;
    echo $nameofcontact;
    echo $phonenumber;
    echo $nameofcontact; */

    // echo "It work´s!";

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';
    updateCustomer($conn, $customerid, $nameofcontact, $emailofcontact, $contactName, $phonenumber, $locationName);

    // header("location: ../edit.php");
    exit();
}

?>

<?php

/* $sql = "UPDATE customers SET firstname='$firstname', lastname='$lastname' WHERE userid='$id;'"; */
/* noch ohne validierung */
?>