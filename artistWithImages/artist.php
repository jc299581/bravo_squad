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
<form id="insert" name="insert" method="post" action="dbProcessArtist.php" enctype="multipart/form-data">
    <fieldset class="subtleSet">
        <h2>Insert new artist:</h2>
        <p>
            <label for="art_name">Name: </label>
            <input type="text" name="art_name" id="art_name" required>
        </p>
        <p>
            <label for="art_blurb">Blurb: </label>
            <input type="text" name="art_blurb" id="art_blurb" required>
        </p>
        <p>
            <label for="art_desc">Description: </label>
            <textarea cols="50" rows="3" name="art_desc" form="insert" required></textarea>
        </p>
        <p>
            <label for="featured">Featured: </label>
            <input type="radio" name="featured" id="yes" value="1">Yes
            <input type="radio" name="featured" id="no" value="0">No
        </p>
        <p>
            <label for="file">Image: </label>
            <input type="file" name="imagefile" id="imagefile" required>
        </p>
        <p>
            <input type="submit" name="submit" id="submit" value="Insert Entry">
            <?php
?>
        </p>
    </fieldset>

</form>

</body>
</html>
