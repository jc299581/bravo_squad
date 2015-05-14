<?php
include("dbconnection.php");
?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>PHP SQLite Music Centre Database</title>
    <script type="text/javascript" src="checkPass.js"></script>
</head>

<body>

<h1>Member Sign-up</h1>
<form id="insert" name="insert" method="post" action="dbProcessMember.php">
    <fieldset class="subtleSet">
        <h2>Insert new member:</h2>
        <p>
            <label for="mem_Fname">First Name: </label>
            <input type="text" name="mem_Fname" id="mem_Fname" required>*
        </p>
        <p>
            <label for="mem_Lname">Last Name: </label>
            <input type="text" name="mem_Lname" id="mem_Lname" required>*
        </p>
        <p>
            <label for="<mem_address">Address: </label>
            <textarea cols="50" rows="1" name="mem_address" form="insert" required></textarea>*
        </p>
        <p>
            <label for="mem_dayPhone">Day phone number: </label>
            <input type="text" name="mem_dayPhone" id="mem_dayPhone" required>*
        </p>
        <p>
            <label for="mem_night">Night phone number:</label>
            <input type="text" name="mem_night" id="mem_night" />
        </p>
        <p>
            <label for="mem_email">Email:</label>
            <input type="email" name="mem_email" id="mem_email" required/>*
        </p>
        <p>
            <label for="mem_password">Password:</label>
            <input type="password" name="mem_password" id="mem_password" onkeyup="CheckPass();" required>*
        </p>

        <p>
            <label for="mem_password2">Confirm Password:</label>
            <input type="password" name="mem_password2" id="mem_password2" onkeyup="CheckPass(); return false; "required>*
            <span id="confirmMessage" class="confirmMessage"></span>
        </p>
        <p>
            <input type="submit" name="submit" id="submit" value="Insert Entry">
        </p>
        <p>
            * Required fields
        </p>
    </fieldset>
</form>

</body>
</html>
