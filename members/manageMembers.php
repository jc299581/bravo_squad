<?php
include("dbconnection.php");
?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>PHP SQLite Music Centre Database</title>
</head>
<body>
<fieldset class="subtleSet">
    <h2>Current member data:</h2>
    <?php
    // Display what's in the database at the moment.
    $sql = "SELECT * FROM Members";
    foreach ($dbh->query($sql) as $row)
    {
        ?>
        <form id="deleteForm" name="deleteForm" method="post" action="dbProcessMember.php">
            <?php
            echo "<br> <label for=\"Fname\"> First name: </label> <input type='text' name='mem_Fname' value='$row[mem_Fname]'/><br>

    <label for=\"Lname\"> Last Name: </label><input type='text' name='mem_Lname' value='$row[mem_Lname]' /><br>

    <label for=\"Address\"> Address: </label><input type='text' name='mem_address' value='$row[mem_address]' /><br>

    <label for=\"DayPhone\"> Day phone number: </label><input type='text' name='mem_dayPhone' value='$row[mem_dayPhone]' /><br>

    <label for=\"NightPhone\"> Night Phone: </label><input type='text' name='mem_night' value='$row[mem_night]' /><br>

    <label for=\"Email\"> Email: </label><input type='text' name='mem_email' value='$row[mem_email]' /><br>

    <label for=\"Password\"> Password: </label><input type='text' name='mem_password' value='$row[mem_password]' /><br>";
            echo "<input type='hidden' name='mem_id' value='$row[mem_id]' />";
            ?>
            <input type="submit" name="submit" value="Update Entry" />
            <input type="submit" name="submit" value="Delete Entry" class="deleteButton">
            <input type="submit" name="submit" value="X" class="deleteButton">

        </form>
    <?php
    }
    echo "</fieldset>\n";
    $dbh = null;
    ?>
</body>
</html>
