<?php
include("dbConnection.php")
?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>PHP SQLite Music Centre Database</title>
</head>

<body>
<h1>Artist Database</h1>
<form id="insert" name="insert" method="post" action="dbProcessArtist.php">
    <fieldset class="subtleSet">
        <h2>Insert new artist:</h2>
        <p>
            <label for="art_name">Name: </label>
            <input type="text" name="art_name" id="art_name">
        </p>
        <p>
            <label for="art_blurb">Blurb: </label>
            <input type="text" name="art_blurb" id="art_blurb">
        </p>
        <p>
            <label for="art_desc">Description: </label>
            <input type="text" name="art_desc" id="art_desc">
        </p>
        <p>
            <label for="featured">Featured: </label>
            <input type="text" name="featured" id="featured">
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
    $sql = "SELECT * FROM Artists";
    foreach ($dbh->query($sql) as $row)
    {
        ?>
        <form id="deleteForm" name="deleteForm" method="post" action="dbProcessArtist.php">
            <?php
            echo "<input type='text' name='art_name' value='$row[art_name]' /><input type='text' name='art_blurb' value='$row[art_blurb]' /><input type='text' name='art_desc' value='$row[art_desc]' /><input type='text' name='featured' value='$row[featured]' />\n";
            echo "<input type='hidden' name='art_id' value='$row[art_id]' />";
            ?>
            <input type="submit" name="submit" value="Update Entry" />
            <input type="submit" name="submit" value="Delete Entry" class="deleteButton">
            <input type="submit" name="submit" value="X" class="deleteButton">
        </form>
    <?php
    }
    echo "</fieldset>\n";
    // close the database connection
    $dbh = null;
    ?>
</body>
</html>
