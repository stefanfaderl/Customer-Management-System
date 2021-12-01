<?php

if (isset($_POST["submit"])) {
    // echo "It work´s!"; 
    $name = $_POST["name"];
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];
    $pwdrepeat = $_POST["pwdrepeat"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputSignup($name, $email, $pwd, $pwdrepeat) !== false) {
        header("location: ../signup.php?error=emptyinput");
        exit();
    }

    if (invalidName($name) !== false) {
        header("location: ../signup.php?error=invalidName");
        exit();
    }

    if (invalidEmail($email) !== false) {
        header("location: ../signup.php?error=invalidEmail");
        exit();
    }

    if (pwdMatch($pwd, $pwdrepeat) !== false) {
        header("location: ../signup.php?error=passwordsdontmatch");
        exit();
    }
    if (nameExists($conn, $name, $email) !== false) {
        header("location: ../signup.php?error=nametaken");
        exit();
    }

    createUser($conn, $name, $email, $pwd);
} else {
    header("location: ../signup.php");
    exit();
}
