<?php
include_once 'header.php';
?>
<article class="customerContainer">
    <h1>Your created contacts:</h1>
    <?php
    require_once 'includes/dbh.inc.php';
    $actualUsername = $_SESSION["username"];

    $sql = "SELECT customersName FROM customers WHERE customersCreatedBy = '$actualUsername';";

    $result = $conn->query($sql);

    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../addcontact.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    if ($result->num_rows > 0) {
        echo "<div>
        <table id='customers'>
        <tr>
        <th>Customer Name</th>
        </tr>";
        while ($row = $result->fetch_assoc()) {

            echo "
        <tr>
        <td>" . $row["customersName"] . "</td>
        
        </tr>";
        }

        echo "</table></div>";
    }

    ?>
</article>
</body>

</html>









<!-- 
Multiquery dont't works, or take too long time but to fix one query works fine
    // echo "<p><span>Hello " . $_SESSION["username"] .  " :)" . "  </span>";
    // $sql .= "SELECT customersName FROM customers WHERE customersCreatedBy = '$actualUsername';";
    
 -->