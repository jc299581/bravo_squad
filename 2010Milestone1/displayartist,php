<?php
include("dbconnection.php")
?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>artist</title>

</head>

<body>
<h1>Artist Database</h1>

<fieldset class="subtleSet">
    <h2>Current data:</h2><br>
    <?php
    // Display what's in the database at the moment.
    $sql = "SELECT * FROM artists";
    foreach ($dbh->query($sql) as $row)
    {
       
        echo "<img href\"images/$row[art_thumbnail]\"> <a href=\"moreinfoartist.php?id=$row[art_id]\">$row[art_name]</a> $row[art_blurb]<br>";     


    }
    echo "</fieldset>\n";
    // close the database connection
    $dbh = null;
    ?>
</body>
</html>
