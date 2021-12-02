<?php
include_once 'header.php';
?>

<hr class="top">
<article class="containerDashboard">
    <?php
    if (isset($_SESSION["username"])) { // user muss stehen
        echo "<p><span>Hello " . $_SESSION["username"] .  " :)" . "  </span>
        <span>nice to see you here!</span></p>";
        echo "<button type='submit' name='submit'>Add contact</button>";
        echo "<button type='submit' name='submit'>Delete contact </button>";
    }
    ?>
</article>

<article class="dashboard">
    <hr>
    <input type="text" name="searchbar" placeholder="Search for a contact">
    <div>
        <table id="customers">
            <tr>
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
                <td>Maria Anders</td>
                <td>Germany</td>
                <td>Alfreds Futterkiste</td>
                <td>Maria Anders</td>
                <td>Germany</td>
                <td>15.12.1994</td>
            </tr>
            <tr>
                <td>Berglunds snabbköp</td>
                <td>Christina Berglund</td>
                <td>Sweden</td>
                <td>Berglunds snabbköp</td>
                <td>Christina Berglund</td>
                <td>Sweden</td>
                <td>15.12.1994</td>
            </tr>
            <tr>
                <td>Centro comercial Moctezuma</td>
                <td>Francisco Chang</td>
                <td>Mexico</td>
                <td>Centro comercial Moctezuma</td>
                <td>Francisco Chang</td>
                <td>Mexico</td>
                <td>15.12.1994</td>
            </tr>
            <tr>
                <td>Ernst Handel</td>
                <td>Roland Mendel</td>
                <td>Austria</td>
                <td>Ernst Handel</td>
                <td>Roland Mendel</td>
                <td>Austria</td>
                <td>15.12.1994</td>
            </tr>
            <tr>
                <td>Island Trading</td>
                <td>Helen Bennett</td>
                <td>UK</td>
                <td>Island Trading</td>
                <td>Helen Bennett</td>
                <td>UK</td>
                <td>15.12.1994</td>
            </tr>
            <tr>
                <td>Königlich Essen</td>
                <td>Philip Cramer</td>
                <td>Germany</td>
                <td>Königlich Essen</td>
                <td>Philip Cramer</td>
                <td>Germany</td>
                <td>15.12.1994</td>
            </tr>
            <tr>
                <td>Laughing Bacchus Winecellars</td>
                <td>Yoshi Tannamuri</td>
                <td>Canada</td>
                <td>Laughing Bacchus Winecellars</td>
                <td>Yoshi Tannamuri</td>
                <td>Canada</td>
                <td>15.12.1994</td>
            </tr>
        </table>
    </div>
</article>