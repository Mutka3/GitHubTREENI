<?php

$dbServername = "mysql.metropolia.fi";
$dbUsername = "mariamv";
$dbPassword = "A1793159357a";
$dbName = "mariamv";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

if (!$conn){
	die('Could not connect: ' . mysql_error());
}

$sql = 'SELECT * FROM';
mysql_select_db('db.inc.php');
$retval = mysql_query($sql, $conn);
if (!$retval){
	die('Data unavailable' . mysql_error());
}
while ($row = mysql_fetch_assoc($retval)){
	echo ""
}
echo "Fetched data successfully\n";

mysql_close($conn);
?>
