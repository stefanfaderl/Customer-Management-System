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
    </header>
</body>

</html>