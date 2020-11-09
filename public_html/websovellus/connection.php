<?php

	$servername = "mysql.metropolia.fi";
	$username = "mariamv";
	$password = "A1793159357a";
	$dbName = "mariamv";

	$link = mysqli_connect($servername, $username, $password, $dbName);
	if(mysqli_connect_error()){

		die("Problem bro..!!");
	}


?>