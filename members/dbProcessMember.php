<?php

include("dbConnection.php");
$debugOn = true;


if ($_REQUEST['submit'] == "X")
{
    $sql = "DELETE FROM Members WHERE mem_id = '$_REQUEST[mem_id]'";
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
    $sql = "INSERT INTO Members (mem_Fname, mem_Lname, mem_address, mem_dayPhone, mem_night, mem_email, mem_password) VALUES ('$_REQUEST[mem_Fname]', '$_REQUEST[mem_Lname]', '$_REQUEST[mem_address]', '$_REQUEST[mem_dayPhone]', '$_REQUEST[mem_night]','$_REQUEST[mem_email]', '$_REQUEST[mem_password]' )";
    echo "<p>Query: " . $sql . "</p>\n<p><strong>";
    if ($dbh->exec($sql))
        echo "Inserted $_REQUEST[mem_Fname]";
    else
        echo "Not inserted"; // in case it didn't work - e.g. if database is not writeable
}
else if ($_REQUEST['submit'] == "Delete Entry")
{
    $sql = "DELETE FROM Members WHERE mem_id = '$_REQUEST[mem_id]'";
    echo "<p>Query: " . $sql . "</p>\n<p><strong>";
    if ($dbh->exec($sql))
        echo "Deleted $_REQUEST[mem_Fname]";
    else
        echo "Not deleted";
}
else if ($_REQUEST['submit'] == "Update Entry")
{
    $sql = "UPDATE Members SET mem_Fname = '$_REQUEST[mem_Fname]', mem_Lname = '$_REQUEST[mem_Lname]',  mem_address = '$_REQUEST[mem_address]',  mem_dayPhone = '$_REQUEST[mem_dayPhone]', mem_night = '$_REQUEST[mem_night]', mem_email = '$_REQUEST[mem_email]', mem_password= '$_REQUEST[mem_password]' WHERE mem_id = '$_REQUEST[mem_id]'";
    echo "<p>Query: " . $sql . "</p>\n<p><strong>";
    if ($dbh->exec($sql))
        echo "Updated $_REQUEST[mem_Fname]";
    else
        echo "Not updated";
}
else {
    echo "This page did not come from a valid form submission.<br />\n";
}
echo "</strong></p>\n";

// Basic select and display all contents from table

echo "<h2>Member Records in Database Now</h2>\n";
$sql = "SELECT * FROM Members";
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
    print $row["mem_Fname"] .' - '. $row["mem_Lname"] .' - '.   $row["mem_address"] .' - '. $row["mem_dayPhone"] .' - '. $row["mem_night"] .' - '. $row["mem_email"] .' - '. $row["mem_password"] . "<br/>\n";
}


$dbh = null;
?>

<p><a href="newMemberForm.php">Return to new member sign-up</a></p>
</body>
</html>
