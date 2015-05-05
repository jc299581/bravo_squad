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
<h1>Events Entry</h1>
<form id="insert" name="insert" method="post" action="dbProcessEvent.php">
    <fieldset class="subtleSet">
        <h2>Insert new Event:</h2>
        <p>
            <label for="evn_name">Name: </label>
            <input type="text" name="evn_name" id="evn_name">
        </p>
        <p>
            <label for="evn_artist">Artist: </label>
            <input type="text" name="evn_artist" id="evn_artist">
        </p>
        <p>
            <label for="evn_blurb">Description: </label>
            <textarea cols="50" rows="3" name="evn_blurb" form="insert"></textarea>
        </p>
        <p>
            <label for="evn_location">location: </label>
            <input type="text" name="evn_location" id="evn_location">
        </p>
        <p>
            <label for="date">date:</label>
            <input type="text" name="evn_date" id="evn_date">
        </p>
        
        <p>
            <input type="submit" name="submit" id="submit" value="Insert Entry">
        </p>
    </fieldset>
</form>

<fieldset class="subtleSet">
    <h2>Current data:</h2>
    <?php
    // Display what's in the database at the moment.
    $sql = "SELECT * FROM events";
    echo "</fieldset>\n";
    // close the database connection
    $dbh = null;
    ?>
</body>
</html>
