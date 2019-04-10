<?php
include 'db.inc.php';


$uname = $_POST['uname'];
$umessage = $_POST['umessage'];

$query = "INSERT INTO chatroom (name, message) VALUES ('$uname', '$umessage')";
$run = mysqli_query($conn, $query);

?>