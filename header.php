<?php
session_start();

?>

<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kundenverwaltungssystem</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header>
        <img onclick="sendToHomescreen()" class="logo" src="img/SF-LogoAusgeschnitten.png" alt="logo">
        <nav>
            <ul class="nav__links">
                <?php
                if (isset($_SESSION["username"])) {
                    echo "<li><a href='dashboard.php'>Dashboard</a></li>";
                    echo "<li><a href='profilepage.php'>Profile page</a></li>";
                    echo "<li><a id='padding' href='includes/logout.inc.php'>Log out</a></li>";
                } else {
                    echo "<li><a href='index.php'>Home</a></li>";
                    echo "<li><a href='signup.php'>Sign up</a></li>";
                    echo "<li><a id='padding' href='login.php'>Log In</a></li>";
                }
                ?>
            </ul>
        </nav>
        <script src="index.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        </script>
    </header>