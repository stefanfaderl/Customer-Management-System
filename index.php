<!-- http://localhost/Kundenverwaltung/index.php -->
<!-- http://localhost/phpmyadmin/ -->

<?php
include_once 'header.php';
?>
<article class="backgroundImage">

    <article class="container">
        <section class="item">
            <?php
            if (isset($_SESSION["username"])) {
            } else {
                echo "<p>Hello World!</p>";
            }
            ?>
        </section>
    </article>

</article>

</body>

</html>