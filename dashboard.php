<?php
include_once 'header.php';
?>

<hr class="top">
<article class="containerDashboard">
    <?php
    if (isset($_SESSION["username"])) { // user muss stehen
        echo "<p><span>Hello " . $_SESSION["username"] .  " :)" . "  </span>
        <span>nice to see you here!</span></p>";
        echo "<a href='addcontact.php'><button>Add contact</button></a>";

        echo "<a href='edit.php'><button>Edit contact</button></a>";

        echo "<form method = 'POST' action = 'delete.php'>";
        echo "<a><button name='cool' type='submit' onclick='deleteContact()'>Delete contact</button></a>";
        echo "</form>";
    }
    ?>
</article>

<article class="dashboard">
    <hr>
    <input class="inputDashboard" type="text" name="searchbar" placeholder="Search for a contact">
    <?php
    require_once 'includes/dbh.inc.php';

    $sql = "SELECT * FROM customers ORDER BY customersName ASC;";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<div>
  <table id='customers'>
  <tr>
  <th><input onclick='toggleCheckbox(this)' class='selectAllCheckboxes' type='checkbox' name='checkbox'></th>
  <th>Name</th>
  <th>Email</th>
  <th>Contact partner</th>
  <th>Phone number</th>
  <th>Location</th>
  <th>Created by</th>
  <th>Created on</th>
  </tr>";
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
    <td><input class='inputCheckbox' type='checkbox' name='checkbox'></td>
    <td>" . $row["customersName"] . "</td><td>" . $row["customersEmail"] . "</td><td>" . $row["customersContactName"] . "</td><td>" . $row["customersPhonenumber"] . "</td><td>" . $row["customersLocationName"] . "</td><td>" . $row["customersCreatedBy"] . "</td><td>" . $row["customersCreatedOn"] .  "</td>
    </tr>";
        }
        echo "</table></div>";
    } else {
        echo "0 results";
    }
    $conn->close();
    ?>
</article>
</body>

</html>








<!-- Table without php -->
<!-- 
    <div>
        <table id="customers">
            <tr>
                <th><input onclick="toggleCheckbox(this)" class="selectAllCheckboxes" type="checkbox" name="all"></th>
                <th>Name</th>
                <th>Email</th>
                <th>Contact partner</th>
                <th>Phone number</th>
                <th>Location</th>
                <th>Created by</th>
                <th>Created on</th>
            </tr>
            <tr>
                <td><input class="inputCheckbox" type="checkbox" name="name1"></td>
                <td>Alfreds Futterkiste</td>
                <td>Maria Anders</td>
                <td>Germany</td>
                <td>Alfreds Futterkiste</td>
                <td>Maria Anders</td>
                <td>Germany</td>
                <td>15.12.1994</td>
            </tr>
        </table>
    </div>
 -->