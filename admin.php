#!/usr/local/bin/php
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css.css">
    <meta charset="UTF-8">
    <title>Sega Genesis | Gaming in the 1990s</title>
</head>
<body>
<header>
    <img src="Images/sitelogo.PNG" alt="gaming in the 90s"/>
    <br/>
</header>
<nav align="right">
    <a href="home.html">Home</a> |
    <a href="snes.html" class="sneslink">Super Nintendo</a> |
    <a href="genesis.html" class="genesislink">Sega Genesis</a> |
    <a href="3dgaming.html">3D Gaming</a> |
    <a href="controversy.html">Controversy</a> |
    <a href="collection.html">Games</a> |
    
</nav>


<?php echo '<p>Connecting To IMDB Database in PHP</p>'; 
require_once("common.php");

$given=$_POST["given"];
$surname=$_POST["surname"];
$gender=$_POST["gender"];
print "<h3>IMDB Add Actor $given $surname ($gender)</h3>";
try {
  $sql=    "INSERT into actors(first_name, last_name, gender) values (:given, :surname, :gender ); ";
  $q=$db->prepare($sql);
  $q->bindParam(':given',$given);
  $q->bindParam(':surname',$surname);
  $q->bindParam(':gender',$gender);
  $count=$q->execute();
  print $count." actor record added.";
} catch (PDOException $ex) {
    print "<p>Sorry, a database error occurred. Please try again later.</p>";
    print "Error details: ".$ex->getMessage()."<br />";
}

?>
</html>
