<?php
include("dbconnection.php");
?>
<fieldset class="subtleSet">
    <h2>Current Artist data:</h2>
    <?php

    $sql = "SELECT * FROM Artists";
    foreach ($dbh->query($sql) as $row) {
        ?>
        <form id="deleteForm" name="deleteForm" method="post" action="dbProcessArtist.php">
            <?php
        echo " <label for=\"Name\"> Name:</label> <input type='text' name='art_name' value='$row[art_name]'/><br>

  <label for=\"blurb\"> Blurb: </label><input type='text' name='art_blurb' value='$row[art_blurb]' /><br>
 <label for=\"desc\"> Description: </label><input type='text' name='art_desc' value='$row[art_desc]' /><br>
   <label for=\"Featured\"> Featured: </label><input type='text' name='featured' value='$row[featured]' /><br>
   <label for=\"Image\"> Image: </label><input type='text' name='art_img' value='$row[art_img]' /><br>
   <label for=\"Thumbnail\"> Thumbnail: </label><input type='text' name='art_thumbnail' value='$row[art_thumbnail]' /><br>";
        echo "<input type='hidden' name='art_id' value='$row[art_id]' />";
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
