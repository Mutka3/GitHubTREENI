<?php


	session_start();

if(array_key_exists('content', $_POST)){

	include("connection.php");

	$query = "UPDATE `users` SET `message` = '".mysqli_real_escape_string($link,$_POST['content'])."' WHERE user_id = '".mysqli_real_escape_string($link,$_SESSION['u_id'])."'LIMIT 1" ;

		if(mysqli_query($link,$query)){

			echo "success";
		}else{

			echo "fail";
		}


}


?>