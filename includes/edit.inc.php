<?php

session_start(); // start session on every site where i need it 
if (isset($_POST["createcontact"])) { // doesn't work
    echo "It work´s!";
    $nameofcontact = $_POST["nameofcontact"];
    $emailofcontact = $_POST["emailofcontact"];
    $contactName = $_POST["contactpartner"];
    $phonenumber = $_POST["phonenumber"];
    $locationName = $_POST["location"];
    $actualUsername = $_SESSION["username"]; // möglicher fehler undefined variable $ Session
    $today = date("Y-m-d H:i:s");

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputCreateContact($nameofcontact, $emailofcontact, $contactName, $phonenumber, $locationName) !== false) {
        header("location: ../addcontact.php?error=emptyinput");
        exit();
    }

    if (invalidNameOfContact($nameofcontact) !== false) {
        header("location: ../addcontact.php?error=invalidName");
        exit();
    }

    if (invalidEmailOfcontact($emailofcontact) !== false) {
        header("location: ../addcontact.php?error=invalidEmail");
        exit();
    }

    if (invalidPhoneNumber($phonenumber) !== false) {
        header("location: ../addcontact.php?error=invalidPhonenumber");
        exit();
    }
    if (invalidLocation($locationName) !== false) {
        header("location: ../addcontact.php?error=invalidLocation");
        exit();
    }
    if (contactExists($conn, $nameofcontact, $emailofcontact) !== false) {
        header("location: ../addcontact.php?error=nametaken");
        exit();
    }
    createCustomer($conn, $nameofcontact, $emailofcontact, $contactName, $phonenumber, $locationName, $actualUsername, $today);
} else {
    header("location: ../addcontact.php");
    exit();
}

?>

<?php

/* $sql = "UPDATE customers SET firstname='$firstname', lastname='$lastname' WHERE userid='$id;'"; */ 
?>