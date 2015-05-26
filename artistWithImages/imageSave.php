<?php

include("dbConnection.php");
$debugOn = true;



if ($_REQUEST['submit'] == "X")
{
    $sql = "DELETE FROM Artists WHERE art_id = '$_REQUEST[art_id]'";
    if ($dbh->exec($sql))
        header("Location: manageArtists.php");
}

echo "</strong></p>\n";

require("wideimage/WideImage.php");

echo "<pre>";
print_r($_FILES);
echo "</pre>\n";

if ($_REQUEST['submit'] == "Insert Entry") {

    if ((($_FILES["imagefile"]["type"] == "image/gif")
            || ($_FILES["imagefile"]["type"] == "image/jpeg")
            || ($_FILES["imagefile"]["type"] == "image/pjpeg"))
        && ($_FILES["imagefile"]["size"] < 2000000)
    ) {

        if ($_FILES["imagefile"]["error"] > 0) {
            echo "Error Code: " . $_FILES["imagefile"]["error"] . "<br />";
        } else {

           echo "<p>Upload: " . $_FILES["imagefile"]["name"] . "<br />\n";
            echo "MIME Type: " . $_FILES["imagefile"]["type"] . "<br />\n";
            echo "Size: " . round($_FILES["imagefile"]["size"] / 1024, 1) . " KB<br />\n";
            // uploaded files are stored in a temporary location on the server until we move them (if we want to)
            echo "Temp file: " . $_FILES["imagefile"]["tmp_name"] . "</p>\n";


            $newName = time() . $_FILES["imagefile"]["name"];
            $newFullName = "images/{$newName}";

            move_uploaded_file($_FILES["imagefile"]["tmp_name"], $newFullName);

            chmod($newFullName, 0644);
            echo "Stored original as: $newFullName<br />\n";

            $size = getimagesize($newFullName);

            echo "<img src=\"$newFullName\" " . $size[3] . " /><br />\n";


            $image = WideImage::load($newFullName);

            $thumbnailImage = $image->resize(150, 150);
            $thumbFullName = "images/thumb{$newName}";
            $thumbnailImage->saveToFile($thumbFullName);
            echo "Stored thumnail as: $thumbFullName<br />\n";
            $size = getimagesize($thumbFullName);
            echo "<img src=\"$thumbFullName\" " . $size[3] . " /><br />\n";
        }

    } else {

        echo "Invalid file";
    }
}

?>
