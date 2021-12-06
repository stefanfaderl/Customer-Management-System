<?php
include_once 'header.php';
?>
<article>
    <h1>Your created contacts:</h1>
    <?php
    echo "<p><span>Hello " . $_SESSION["username"] .  " :)" . "  </span>";
    $sql = "SELECT * FROM customers WHERE createdBy = $actualUsername;";
    ?>

</article>
</body>
</html>