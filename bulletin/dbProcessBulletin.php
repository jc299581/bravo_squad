<?php

include("dbConnection.php");
$debugOn = true;


if ($_REQUEST['submit'] == "X")
{
    $sql = "DELETE FROM bulletin WHERE bul_id = '$_REQUEST[bul_id]'";
    if ($dbh->exec($sql))
        header("Location: manageMembers.php");
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
    $sql = "INSERT INTO bulletin (bul_title, bul_des, bul_expDate) VALUES ('$_REQUEST[bul_title]', '$_REQUEST[bul_des]', '$_REQUEST[bul_expDate]')";
    echo "<p>Query: " . $sql . "</p>\n<p><strong>";
    if ($dbh->exec($sql))
        echo "Inserted $_REQUEST[bul_title]";
    else
        echo "Not inserted"; // in case it didn't work - e.g. if database is not writeable
}
else if ($_REQUEST['submit'] == "Delete Entry")
{
    $sql = "DELETE FROM bulletin WHERE mem_id = '$_REQUEST[mem_id]'";
    echo "<p>Query: " . $sql . "</p>\n<p><strong>";
    if ($dbh->exec($sql))
        echo "Deleted $_REQUEST[bul_title]";
    else
        echo "Not deleted";
}
else if ($_REQUEST['submit'] == "Update Entry")
{
    $sql = "UPDATE bulletin SET bul_title = '$_REQUEST[bul_title]', bul_des = '$_REQUEST[bul_des]',  bul_expDate = '$_REQUEST[bul_expDate]' WHERE bul_id = '$_REQUEST[bul_id]'";
    echo "<p>Query: " . $sql . "</p>\n<p><strong>";
    if ($dbh->exec($sql))
        echo "Updated $_REQUEST[bul_title]";
    else
        echo "Not updated";
}
else {
    echo "This page did not come from a valid form submission.<br />\n";
}
echo "</strong></p>\n";

// Basic select and display all contents from table

echo "<h2>Bulletin Records in Database Now</h2>\n";
$sql = "SELECT * FROM bulletin";
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
    print $row[bul_title] .' - '. $row[bul_des]  .' - '.   $row[bul_expDate] . "<br />\n";
}


$dbh = null;
?>

<p><a href="bulletin.php">Return to database test page</a></p>
</body>
</html>
