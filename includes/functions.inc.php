<?php
function emptyInputSignup($name, $email, $username, $pwd, $pwdrepeat)
{
    $result = false;
    if (empty($name) || empty($email) || empty($username) || empty($pwd) || empty($pwdrepeat)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidUid($username)
{
    $result = false;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) { // wenn ein fehler ist = true, kommt wieder zurück zur signup page
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

function uidExists($conn, $username, $email)
{
    $sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;";
    $stmt = mysqli_stmt_init($conn); // statement

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
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

function createUser($conn, $name, $email, $username, $pwd)
{
    $sql = "INSERT INTO users (usersName,usersEmail,usersUid,usersPwd) VALUES (?, ?, ?,?);";
    $stmt = mysqli_stmt_init($conn); // statement

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../signup.php?error=none");
    exit();
}

function emptyInputLogin($username, $pwd)
{
    $result = false;
    if (empty($username) || empty($pwd)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function loginUser($conn, $username, $pwd)
{
    $uidExists = uidExists($conn, $username, $username);

    if ($uidExists === false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    }

    $pwdHashed = $uidExists["usersPwd"]; // become assoziatives array fromdatabase, used names, not index 

    $checkPwd = password_verify($pwd, $pwdHashed);

    if ($checkPwd == false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    } else if ($checkPwd == true) { //start session
        session_start();
        $_SESSION["userid"] =  $uidExists["usersId"];
        $_SESSION["useruid"] =  $uidExists["usersUid"];
        header("location: ../index.php");
        exit();
    }
}
