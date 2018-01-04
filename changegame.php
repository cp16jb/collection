#!/usr/local/bin/php
<html>
<head>
<title>PHP Connect To IMDB Database</title>
</head>
<body>
<?php echo '<p>Connecting To IMDB Database in PHP</p>'; 
require_once("common.php");

$gn=$_POST["given"];
$sn=$_POST["surname"];
$fc=$_POST["fcount"];
print "<h3>IMDB Change Actor $gn $sn ($fc)</h3>";
try {
  $sql=    "UPDATE actors SET film_count= :fc WHERE first_name=:gn and last_name=:sn";
  $q=$db->prepare($sql);
  $q->bindParam(':gn',$gn);
  $q->bindParam(':sn',$sn);
  $q->bindParam(':fc',$fc);
  $q->execute();
} catch (PDOException $ex) {
    print "<p>Sorry, a database error occurred. Please try again later.</p>";
    print "Error details: ".$ex->getMessage()."<br />";
}

?>
</html>
