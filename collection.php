#!/usr/bin/php-cgi
<?php
$db_host = 'localhost'; // Server Name
$db_user = 'cp16jb'; // Username
$db_pass = '6082846'; // Password
$db_name = 'cp16jb'; // Database Name

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
    die ('Failed to connect to MySQL: ' . mysqli_connect_error());
}

$sql = 'SELECT * 
		FROM Collection';

$query = mysqli_query($conn, $sql);

if (!$query) {
    die ('SQL Error: ' . mysqli_error($conn));
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" type="text/css" href="css.css">
    <meta charset="UTF-8">
    <title>Collection | Gaming in the 90s Store</title>
</head>
<body>
<header>
    <img src="Images/sitelogo.PNG" href="home.html">
    <br/>
</header>
<nav align="right">
    <a href="home.html">Home</a> |
    <a href="collection.html">Collection</a> |
    <a href="login.html">Login</a>
</nav>
<div align="center">
    <h2 align="center" class="collection_description">
        Below is our growing collection of videogames to choose from! </br>
        Please note that it's not possible to order directly from our site yet, but we're working on it!
    </h2>

    <table>
        <thead>
        <tr>
            <th>TITLE</th>
            <th>PUBLISHER</th>
            <th>RELEASE DATE</th>
            <th>CONSOLE</th>
            <th>ESRB RATING</th>
            <th>COPIES AVAILABLE</th>
        </tr>
        </thead>
        <tbody>
        <?php
        while ($row = mysqli_fetch_array($query))
        {
            // $amount  = $row['amount'] == 0 ? '' : number_format($row['amount']);
            echo '<tr>
					<td>'.$row['title'].'</td>
					<td>'.$row['publisher'].'</td>
					<td>'.$row['release_date'].'</td>
					<td>'.$row['console'].'</td>
					<td>'.$row['esrb_rating'].'</td>
					<td>'.$row['copies_available'].'</td>
				</tr>';
        }?>
        </tbody>
        <tfoot>
        <tr>
            <th colspan="4">TOTAL</th>
            <th><?=number_format($total)?></th>
        </tr>
        </tfoot>
    </table>
</div>
</body>
</html>
