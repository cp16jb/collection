#!/usr/local/bin/php
<html>
<head>
<title>PHP Connect To IMDB Database</title>
</head>
<body>
<?php echo '<p>Connecting To IMDB Database in PHP</p>'; 
require_once("common.php");

$tl=$_POST["title"];
$pb=$_POST["publisher"];
$ca=$_POST["cavail"];
$rd=$_POST["rdate"];
$cs=$_POST["console"];
$es=$_POST["esrb"];
print "<h3>IMDB Change Game </h3>";
try {
  $sql=    "UPDATE Collection SET copies_available= :ca WHERE title=:tl and publisher=:pb and release_date=:rd and console=:cs and esrb_rating=:es";
  
  $q=$db->prepare($sql);
  $q->bindParam(':tl',$tl);
  $q->bindParam(':pb',$pb);
  $q->bindParam(':ca',$ca);
  $q->bindParam(':rd',$rd);
  $q->bindParam(':cs',$cs);
  $q->bindParam(':es',$es);
  
  $q->execute();
} catch (PDOException $ex) {
    print "<p>Sorry, a database error occurred. Please try again later.</p>";
    print "Error details: ".$ex->getMessage()."<br />";
}

?>
</html>
