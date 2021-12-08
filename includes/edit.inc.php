<?php
session_start();

$customerid = $_POST["customerid"];
$nameofcontact = $_POST["nameofcontact"];
$emailofcontact = $_POST["emailofcontact"];
$contactName = $_POST["contactpartner"];
$phonenumber = $_POST["phonenumber"];
$locationName = $_POST["location"];

if (isset($_POST["editcontact"])) {
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';
    updateCustomer($conn, $customerid, $nameofcontact, $emailofcontact, $contactName, $phonenumber, $locationName);
    exit();
}

?>































<?php

/* $sql = "UPDATE customers SET firstname='$firstname', lastname='$lastname' WHERE userid='$id;'"; */
/* noch ohne validierung */
?>