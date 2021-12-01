<?php
include_once 'header.php';
?>

<article>
    <section class="contactForm">
        <form action="includes/signup.inc.php" method="post">
            <h1>Sign Up</h1>
            <input type="text" name="name" placeholder="Full name...">
            <input type="text" name="email" placeholder="Email...">
            <input type="password" name="pwd" placeholder="Password...">
            <input type="password" name="pwdrepeat" placeholder="Repeat password..">
            <button type="submit" name="submit">Sign Up</button>
        </form>
        <?php
        if (isset($_GET["error"])) {
            if ($_GET["error"] == "emptyinput") {
                echo "<p class='error'>Fill in all fields!</p>";
            } else if ($_GET["error"] == "invalidName") {
                echo "<p class='error'>Choose a proper name!</p>";
            } else if ($_GET["error"] == "invalidemail") {
                echo "<p class='error'>Choose a proper email!</p>";
            } else if ($_GET["error"] == "passwordsdontmatch") {
                echo "<p class='error'>Passwords doesn't match!</p>";
            } else if ($_GET["error"] == "stmtfailed") { // statment
                echo "<p class='error'>Something went wrong, try again!</p>";
            } else if ($_GET["error"] == "nametaken") {
                echo "<p class='error'>Name already taken!</p>";
            } else if ($_GET["error"] == "none") {
                echo "<p class='worked'>You have signed up!</p>";
            }
        }
        ?>
    </section>
</article>