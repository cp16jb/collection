#!/usr/local/bin/php
<html>
<head>
<title>PHP Connect To IMDB Database</title>
</head>
<body>
<?php echo '<p>Connecting To IMDB Database in PHP</p>'; 
require_once("common.php");

$title=$_POST["title"];
$publisher=$_POST["publisher"];
$cavailable=$_POST["cavailable"];
$releasedate=$_POST["release"];
$console=$_POST["console"];
$esrb=$_POST["esrb"];
  
  
print "<h3>IMDB Add New Game</h3>";
try {
  $sql=    "INSERT into Collection(title, publisher, copies_available, release_date, console, esrb_rating) values (:title, :publisher, :cavailable, :release, :console, :esrb ); ";
  
  $q=$db->prepare($sql);
  $q->bindParam(':title',$title);
  $q->bindParam(':publisher',$publisher);
  $q->bindParam(':cavailable',$cavaiable);
  $q->bindParam(':release',$releasedate);
  $q->bindParam(':console',$console);
  $q->bindParam(':esrb',$esrb);
  $count=$q->execute();
  print $count." record added.";
} catch (PDOException $ex) {
    print "<p>Sorry, a database error occurred. Please try again later.</p>";
    print "Error details: ".$ex->getMessage()."<br />";
}

?>
</html>
