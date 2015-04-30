<?php
include("dbconnection.php");
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>artist</title>

</head>

<body>
<h1>Artist Database</h1>
    <?php
        $sql = "SELECT * FROM Artists WHERE art_id = $_GET[id]";
        $result=$dbh->query($sql);
        $rescopy = $result->fetchAll(PDO::FETCH_ASSOC); //index associated with column name 
       foreach($rescopy as $row) {
           echo "<h2>$row[art_name]</h2> $row[art_desc], $row[art_img]";
        echo "<br>";
       }

    ?>
</body>
</html>
