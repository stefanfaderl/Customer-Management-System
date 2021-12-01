<?php
include_once 'header.php';
?>

<section class="contactForm">
    <form action="includes/login.inc.php" method="post">
        <h1>Log In</h1>
        <input type="text" name="uid" placeholder="Username/Email...">
        <input type="password" name="pwd" placeholder="Password...">
        <button type="submit" name="submit">Log In</button>
    </form>
    <?php
    if (isset($_GET["error"])) {
        if ($_GET["error"] == "emptyinput") {
            echo "<p class='error'>Fill in all fields!</p>";
        } else if ($_GET["error"] == "wronglogin") {
            echo "<p class='error'>Incorrect login information!</p>";
        }
    }
    ?>
</section>