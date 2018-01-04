#!/usr/local/bin/php
<html>
<head>
<title>PHP Connect To IMDB Database</title>
</head>
<body>
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
