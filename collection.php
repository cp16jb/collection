#!/usr/bin/php-cgi

<!--
Name: Cole Perry & Heshan Modaragamage
Date: January 9th, 2017
Course: COSC 2P89
Final Project "The Collector"
-->

<?php

$conn = mysqli_connect('localhost', 'cp16jb', '6082846', 'cp16jb');
if (!$conn) {
    die ('Oops! There was a problem connecting to the SQL server. Here are
          some details about the crash: ' . mysqli_connect_error());
}

$sql = 'SELECT * 
		FROM Collection';

$query = mysqli_query($conn, $sql);

if (!$query) {
    die ('Oops! There was an unexpected runtime error. 
          Here are the details: ' . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta charset="UTF-8">
    <title>Collection | The 90s Collector</title>
</head>
<body>
<header>
    <a href="home.html"><img src="Images/sitelogo.PNG" alt="the 90s collector"></a>
    <br/>
</header>
<nav align="right">
    <a href="home.html">Home</a> |
    <a href="collection.php">Collection</a> |
    <a href="login.html">Login</a> |
    <a href="addgame.html">Add Game</a>
</nav>
<div align="center">
    <h2 align="center" class="collection_description">
        Below is our growing collection of videogames to choose from!
    </h2>
    <br/>

    <table class="collection-table">
        <thead>
        <tr>
            <th>IMAGE</th>
            <th>INFO</th>
        </tr>
        </thead>
        <tbody>
        <?php
        while ($row = mysqli_fetch_array($query))
        {
            if ($row['picture'] == NULL) {
                $img = 'Images/default_image.png';
            } else {
                $img = $row['picture'];
            }

            if ($row['copies_available'] <= 0) {
                $copies_available = "** SOLD OUT **";
            } else {
                $copies_available = $row['copies_available'];
            }

            $title = $row['title'];
            $publisher = $row['publisher'];
            $release_date = $row['release_date'];
            $console = $row['console'];
            $esrb_rating = $row['esrb_rating'];


            echo '<tr class="collection-info">
                    <td>
                        <img src='.$img.' class="box-art" align="center"/>
                    </td>
					<td>
					    Title: '.$row['title'].'<br/>
					    Publisher: '.$row['publisher'].'<br/>
					    Release Date: '.$row['release_date'].'<br/>
					    Console: '.$row['console'].'<br/>
					    ESRB: '.$row['esrb_rating'].'<br/>
					    <strong>Copies Available: '.$copies_available.'</strong>
					</td>
				</tr>';
        }?>
        </tbody>
    </table>
</div>
<footer>
    <br/>
    <p align="center">This site was created by Cole Perry and Heshan Modaragamage.</p>
    <p align="center"><a href="reference.html">Site References</a></p>
    <br/>
    <br/>
</footer>
</body>
</html>
