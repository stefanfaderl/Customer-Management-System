<!-- http://localhost/Kundenverwaltung/index.php -->

<?php
include_once 'header.php';
?>

<article class="container">
    <section class="item">
        <?php
        if (isset($_SESSION["useruid"])) {
            echo "<p>Hello " . $_SESSION["useruid"] .  " :)" . " </p>";
            echo "<p>Nice to see you!</p>";
        } else {
            echo "<p>Hello World!</p>";
        }
        ?>
    </section>
</article>