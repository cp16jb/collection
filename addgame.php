#!/usr/local/bin/php
<?php

/*
Name: Cole Perry & Heshan Modaragamage
Date: January 9th, 2017
Course: COSC 2P89
Final Project "The Collector"
*/

//**IMAGE HANDLING (error handling obtained from https://www.w3schools.com/php/php_file_upload.asp) */

$image_folder = "Images/";
$image_file = $image_folder . basename($_FILES["picture"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($image_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["picture"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($image_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["picture"]["size"] > 1000000) {
    echo "Sorry, your file is too large. Keep it under 1MB.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" && $imageFileType != "PNG" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file

} else {
    if (move_uploaded_file($_FILES["picture"]["tmp_name"], $image_file)) {
        $conn = mysqli_connect('localhost', 'cp16jb', '6082846', 'cp16jb');
        if (!$conn) {
            die ('Oops! There was a problem connecting to the SQL server. Here are
          some details about the crash: ' . mysqli_connect_error());
        }
        $sql = "INSERT INTO Collection (title, picture, publisher, release_date, console, esrb_rating, copies_available)
        VALUES ('$_POST[title]', '$image_file', '$_POST[publisher]', '$_POST[release_date]',
        '$_POST[console]', '$_POST[esrb_rating]', '$_POST[copies_available]')";

        $query = mysqli_query($conn, $sql);

        if (!$query) {
            die ('Oops! There was an unexpected runtime error. 
          Here are the details: ' . mysqli_error($conn));
        }
        echo "The file ". basename( $_FILES["picture"]["name"]). " has been uploaded to directory.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

//** END OF IMAGE HANDLING. */
?>

<!DOCTYPE html>
<html lang="en">

<a href="home.html">Back to Home</a>

</html>
