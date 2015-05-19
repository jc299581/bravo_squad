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
<h1> Bulletin</h1>
<form id="insert" name="insert" method="post" action="dbProcessBulletin.php">
    <fieldset class="subtleSet">
        <h2>Insert new item:</h2>
        <p>
            <label for="bul_title">Title: </label>
            <input type="text" name="bul_title" id="bul_title">
        </p>
        <p>
            <label for="<bul_des">Description: </label>
            <textarea cols="50" rows="3" name="bul_des" form="insert"></textarea>
        </p>
        <p>
            <label for="bul_expDate">Expiration date:</label>
            <input type="date" name="bul_expDate" id="bul_expDate">
        </p>
        <p>
            <input type="submit" name="submit" id="submit" value="Insert Entry">
        </p>
    </fieldset>
</form>

</body>
</html>
