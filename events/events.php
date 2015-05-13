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
            <?php
                $sql="SELECT art_name,art_id FROM Artists";
                echo "Line 1";
                echo "<select name='evn_artist' id='evn_artist'>"; // list box select command
                foreach ($dbh->query($sql) as $row){//Array or records stored in $row
                echo "<option value='$row[art_id]'>$row[art_name]</option>"; 
                /* Option values are added by looping through the array */ 
                }
                echo "</select>";// Closing of list box
            ?>
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
            <input type="text" name="evn_day" id="day" placeholder="dd" size="2" maxlength="2">
            <input type="text" name="evn_month" id="month" placeholder="mm" size="2" maxlength="2">
            <input type="text" name="evn_year" id="year" placeholder="yyyy" size="4" maxlength="4">
        </p>
        
        <p>
            <input type="submit" name="submit" id="submit" value="Insert Entry">
            <input type="submit" name="submit" value="Delete Old Entries">
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
