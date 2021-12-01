<?php
function emptyInputSignup($name, $email, $pwd, $pwdrepeat)
{
    $result = false;
    if (empty($name) || empty($email) || empty($pwd) || empty($pwdrepeat)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidName($name)
{
    $result = false;
    if (!preg_match("/^[a-zA-Z0-9 ]*$/", $name)) { // wenn ein fehler ist = true, kommt wieder zurück zur signup page
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidEmail($email)
{
    $result = false;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function pwdMatch($pwd, $pwdrepeat)
{
    $result = false;
    if ($pwd !== $pwdrepeat) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function nameExists($conn, $name, $email)
{
    $sql = "SELECT * FROM users WHERE usersName = ? OR usersEmail = ?;";
    $stmt = mysqli_stmt_init($conn); // statement

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $name, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function createUser($conn, $name, $email, $pwd)
{
    $sql = "INSERT INTO users (usersName,usersEmail,usersPwd) VALUES (?, ?, ?);";
    $stmt = mysqli_stmt_init($conn); // statement

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sss", $name, $email, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../signup.php?error=none");
    exit();
}

function emptyInputLogin($name, $pwd)
{
    $result = false;
    if (empty($name) || empty($pwd)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function loginUser($conn, $name, $pwd)
{
    $nameExists = nameExists($conn, $name, $name); //entweder name oder email

    if ($nameExists === false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    }

    $pwdHashed = $nameExists["usersPwd"]; // become assoziatives array fromdatabase, used names, not index 

    $checkPwd = password_verify($pwd, $pwdHashed);

    if ($checkPwd == false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    } else if ($checkPwd == true) { //start session
        session_start();
        $_SESSION["userid"] =  $nameExists["usersId"];
        $_SESSION["username"] =  $nameExists["usersName"];
        header("location: ../index.php");
        exit();
    }
}
