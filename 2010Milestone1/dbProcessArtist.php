<?php

include("dbConnection.php");
$debugOn = true;


if ($_REQUEST['submit'] == "X")
{
    $sql = "DELETE FROM Artists WHERE art_id = '$_REQUEST[art_id]'";
    if ($dbh->exec($sql))
        header("Location: artist.php");
}
?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>PHP SQLite Music Centre Database - Results Page</title>
</head>

<body>
<h1>Results</h1>
<?php
echo "<h2>Form Data</h2>";
echo "<pre>";
print_r($_REQUEST);
echo "</pre>";

if ($_REQUEST['submit'] == "Insert Entry")
{
    $sql = "INSERT INTO Artists (art_name, art_blurb, art_desc, featured, art_img, art_thumbnail) VALUES ('$_REQUEST[art_name]', '$_REQUEST[art_blurb]', '$_REQUEST[art_desc]', '$_REQUEST[featured]', '$_REQUEST[art_img]','$_REQUEST[art_thumbnail]' )";
    echo "<p>Query: " . $sql . "</p>\n<p><strong>";
    if ($dbh->exec($sql))
        echo "Inserted $_REQUEST[art_name]";
    else
        echo "Not inserted"; // in case it didn't work - e.g. if database is not writeable
}
else if ($_REQUEST['submit'] == "Delete Entry")
{
    $sql = "DELETE FROM Artists WHERE art_id = '$_REQUEST[art_id]'";
    echo "<p>Query: " . $sql . "</p>\n<p><strong>";
    if ($dbh->exec($sql))
        echo "Deleted $_REQUEST[art_name]";
    else
        echo "Not deleted";
}
else if ($_REQUEST['submit'] == "Update Entry")
{
    $sql = "UPDATE Artists SET art_name = '$_REQUEST[art_name]', art_blurb = '$_REQUEST[art_blurb]',  art_desc = '$_REQUEST[art_desc]',  featured = '$_REQUEST[featured]', art_img = '$_REQUEST[art_img]', art_thumbnail = '$_REQUEST[art_thumbnail]' WHERE art_id = '$_REQUEST[art_id]'";
    echo "<p>Query: " . $sql . "</p>\n<p><strong>";
    if ($dbh->exec($sql))
        echo "Updated $_REQUEST[art_name]";
    else
        echo "Not updated";
}
else {
    echo "This page did not come from a valid form submission.<br />\n";
}
echo "</strong></p>\n";

// Basic select and display all contents from table

echo "<h2>Artist Records in Database Now</h2>\n";
$sql = "SELECT * FROM Artists";
$result = $dbh->query($sql);
$resultCopy = $result;

if ($debugOn) {
echo "<pre>";
    $rows = $result->fetchall(PDO::FETCH_ASSOC);
    echo count($rows) . " records in table<br />\n";
    print_r($rows);
    echo "</pre>";
    echo "<br />\n";

}
foreach ($dbh->query($sql) as $row)
{
    print $row[art_name] .' - '. $row[art_blurb] .  $row[art_desc] .' - '. $row[featured] .' - '. "<br />\n";
}


$dbh = null;
?>

<p><a href="artist.php">Return to database test page</a></p>
</body>
</html>
