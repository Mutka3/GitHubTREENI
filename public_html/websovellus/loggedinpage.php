<?php

	session_start();

	$message = "";

	
	if (isset($_SESSION['u_id'])) {

		include("connection.php");

		$query = "SELECT `message` FROM `users` WHERE user_id = '".mysqli_real_escape_string($link,$_SESSION['u_id'])."' LIMIT 1";

		$result = mysqli_query($link,$query);
		$row = mysqli_fetch_array($result);
		$message = $row['message'];

	}else{

		header("Location: main2.php?erroruid");
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>

	<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="style.css">


	<link rel="stylesheet" href="boxcss.css">
<!-- Latest compiled and minified CSS -->

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Capriola" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Lato" />
<link rel="stylesheet" href="css/chat.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
   


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Capriola" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Lato" />

</head>
<body>


<div id="header">
GOLDMIND
</div>
<div id="container">

<div class="pikkul">

<div id="green">
<form action="includes/logout.inc.php" method="POST">
<button  type="submit" name="submit"> 
    <a class="btn1" href="#">
        <i class="fas fa-sign-out-alt"></i>
    </a>
</button>
</form>
</div>

<div id="blue">
    <a class="btn1" href="main2.php">
        <i class="fas fa-home"></i>
    </a>
</div>





	<div  id="message">
		
		<textarea  id="text"name="text" rows="20" style="overflow: hidden; word-wrap: break-word; resize: none; height: 100%; ">
			<?php echo $message;  ?>
		</textarea>

	</div>
	</div>
	</div>
<!--
	<div class ="wrapper" id="text">

<form id="paper" method="get" action="">

	<div id="margin">Title: <input id="title" type="text" name="title"></div>
	<textarea class="container" placeholder="Enter something funny." id="text" name="text" rows="4" style="overflow: hidden; word-wrap: break-word; resize: none; height: 160px; "><?php echo $message;  ?></textarea>  
	<br>
	<input id="button" type="submit" value="Create">
	
</form>

</div>
-->








	<script src="bootstrap/js/tether.min.js"></script>
	<script type="text/javascript" src="jquery.min.js"></script>	
	<script src="bootstrap/js/bootstrap.js"></script>
	<script type="text/javascript">
		
		$("#text").on("change paste keyup", function() {

 			  $.ajax({
				  method: "POST",
				  url: "updateText.php",
				  data: { content: $("#text").val() }
				});

		});

	</script>
	<script type="text/javascript">
	$(document).ready(function(){
  $('#title').focus();
    $('#text').autosize();
});
	
	</script>
</body>
</html>