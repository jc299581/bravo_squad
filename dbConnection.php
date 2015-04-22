<?php

try {
    $dbh = new PDO("sqlite:musiccentre.sqlite");
}
catch(PDOException $e)
{
    echo $e->getMessage();
}
?>
