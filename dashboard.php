<?php
include_once 'header.php';
?>

<hr class="top">
<article class="containerDashboard">
    <?php
    if (isset($_SESSION["username"])) { // user muss stehen
        echo "<p><span>Hello " . $_SESSION["username"] .  " :)" . "  </span>
        <span>nice to see you here!</span></p>";

        echo "<form method = 'POST' action = 'addcontact.php'>";
        echo "<button id='btn-dashboard' name='button' type='submit'>Add contact</button>";
        echo "</form>";

        echo "<form method = 'POST' action = 'edit.php'>";
        echo "<button id='btn-dashboard' name='button' type='submit'>Edit contact</button>";
        echo "</form>";

        echo "<form method = 'POST' action = 'delete.php'>";
        echo "<div id='deleteForm'></div>";
        echo "<button id='btn-dashboard' name='button' type='submit' onclick='deleteContact()'>Delete contact</button>";
        echo "</form>";
    }
    ?>
</article>

<article class="dashboard">
    <hr>
    <form method="post">
        <input class="inputDashboard" type="text" name="searchbar" placeholder="Search for a contact name">
    </form>

    <?php
    require_once 'includes/dbh.inc.php';

    $sql = "SELECT * FROM customers ORDER BY customersId ASC;";
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
        /*<th>ID</th>*/
        /* <td>" . $row["customersId"] . "</td> */
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
    <td><input class='inputCheckbox' type='checkbox' name='checkbox' data-id='" . $row["customersId"] . "'></td>
    <td>" . $row["customersName"] . "</td><td>" . $row["customersEmail"] . "</td><td>" . $row["customersContactName"] . "</td><td>" . $row["customersPhonenumber"] . "</td><td>" . $row["customersLocationName"] . "</td><td>" . $row["customersCreatedBy"] . "</td><td>" . $row["customersCreatedOn"] .  "</td>
    </tr>";
        }
        echo "</table></div>";
    } else {
    ?>
        <script>
            hideForm();
        </script>
    <?php
        echo "<p class = 'noContacts' >No contacts have been created yet!</p>";
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

<!-- Searchbar lassen -->