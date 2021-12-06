<?php
include_once 'header.php';
require_once 'dbh.inc.php';
$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM customers WHERE userid='$id'");
$row = mysqli_fetch_array($query);
?>

<h1>Edit</h1>
<form method="POST" action="includes/edit.inc.php" <?php echo $id; ?>>
    <label>Firstname:</label><input type="text" value="<?php echo $row['firstname']; ?>" name="firstname">
    <label>Lastname:</label><input type="text" value="<?php echo $row['lastname']; ?>" name="lastname">
    <article class="dashboard">
        <hr>
        <input type="text" name="searchbar" placeholder="Search for a contact">
        <div>
            <table id="customers">
                <tr>
                    <th><input type="checkbox" name="all" onchange="checkAll(this)"></th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Contact partner</th>
                    <th>Phone number</th>
                    <th>Location</th>
                    <th>Created by</th>
                    <th>Created on</th>
                </tr>
                <tr>
                    <td>Alfreds Futterkiste</td>
                </tr>
                <tr>
                    <td>Berglunds snabbköp</td>
                </tr>
                <tr>
                    <td>Centro comercial Moctezuma</td>
                </tr>
                <tr>
                    <td>Ernst Handel</td>
                </tr>
                <tr>
                    <td>Island Trading</td>
                </tr>
                <tr>
                    <td>Königlich Essen</td>
                </tr>
                <tr>
                    <td>Laughing Bacchus Winecellars</td>
                </tr>
            </table>
        </div>
    </article>
</form>
</body>

</html>