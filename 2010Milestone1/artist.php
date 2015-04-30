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
            <textarea cols="50" rows="3" name="art_desc" form="insert"></textarea>
        </p>
        <p>
            <label for="featured">Featured: </label>
            <input type="radio" name="featured" id="yes" value="1">Yes
            <input type="radio" name="featured" id="no" value="0">No
        </p>
        <p>
            <label for="file">Image:</label>
            <input type="file" name="art_img" id="art_img" />
        </p>
            <p>
                <label for="thumbnail">Thumbnail:</label>
                <input type="file" name="art_thumbnail" id="art_thumbnail"/>
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
            echo " <label for=\"Name\"> Name:</label> <input type='text' name='art_name' value='$row[art_name]'/>
  <label for=\"blurb\"> Blurb:</label><input type='text' name='art_blurb' value='$row[art_blurb]' />
 <label for=\"desc\"> Description:</label><input type='text' name='art_desc' value='$row[art_desc]' />
   <label for=\"Featured\"> Featured:</label><input type='text' name='featured' value='$row[featured]' />
   <label for=\"Image\"> Image:</label><input type='text' name='art_img' value='$row[art_img]' />
   <label for=\"Thumbnail\"> Thumbnail:</label><input type='text' name='art_thumbnail' value='$row[art_thumbnail]' />\n";
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
