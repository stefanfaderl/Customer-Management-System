<?php
include_once 'header.php';
$actualUsername = $_SESSION['username'];
$today = date("Y-m-d H:i:s");
?>

<article>
    <section class="contactForm">
        <form action="includes/createcontact.inc.php" method="post">
            <h1>Create contact</h1>
            <input type="text" name="nameofcontact" placeholder="Full contact name">
            <input type="text" name="emailofcontact" placeholder="Email">
            <input type="text" name="contactpartner" placeholder="Contact partner">
            <input type="text" name="phonenumber" placeholder="Phone number">
            <input type="text" name="location" placeholder="Location">
            <button type="submit" name="createcontact">Create contact</button>
        </form>
        <?php
        if (isset($_GET["error"])) {
            if ($_GET["error"] == "emptyinput") {
                echo "<p class='error'>Fill in all fields!</p>";
            } else if ($_GET["error"] == "invalidName") {
                echo "<p class='error'>Choose a proper name!</p>";
            } else if ($_GET["error"] == "invalidemail") {
                echo "<p class='error'>Choose a proper email!</p>";
            } else if ($_GET["error"] == "invalidPhonenumber") {
                echo "<p class='error'>Choose a proper phonenumber!</p>";
            } else if ($_GET["error"] == "stmtfailed") { // statment
                echo "<p class='error'>Something went wrong, try again!</p>";
            } else if ($_GET["error"] == "nametaken") {
                echo "<p class='error'>Name already taken!</p>";
            } else if ($_GET["error"] == "invalidLocation") {
                echo "<p class='error'>Choose a proper location!</p>";
            } else if ($_GET["error"] == "none") {
                echo "<p class='worked'>You have created a new customer!</p>";
                echo "<p class='worked'>Hello " . $_SESSION["username"] .  " :)" . " </p>";
                echo "<p class='worked'>Hello " . $actualUsername .  " :)" . " </p>";
                echo "<p class='worked'>Date: " . $today .  " :)" . " </p>";
            }
        }
        ?>
    </section>
</article>