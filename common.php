<?php

$SERVER   = "localhost";
$USERNAME = "cp16jb";
$PASSWORD = "6082846";
$DATABASE = "Collection";

$db = new PDO("mysql:dbname={$DATABASE}; host={$SERVER}",  $USERNAME, $PASSWORD);

?>
