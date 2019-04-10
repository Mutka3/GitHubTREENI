<?php
    session_start();

    include 'includes/db.inc.php';
?>



<!doctype <!DOCTYPE html>
<html>

<style>
*{margin:0px; padding:0px;}
#main{border:1px solid black; width:450px; height:500px; margin:24px auto;}
#message_area {width:98%; border:1px solid blue; height:400px;}
</style>



<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Chatroom</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <script src="main.js"></script>
</head>
<body>

<?php 


if(isset($_SESSION['u_uid'])){

    echo 'Welcome ' .$_SESSION['u_uid'] ;
    echo '<form action="includes/logout.inc.php" method="POST">
    <button type="submit" name="submit">Logout</button>
</form>';

}else{
    echo'<form action="includes/login.inc.php" method="POST">
    <input type="text" name="uid" placeholder="Username/e-mail">
    <input type="password" name="pwd" placeholder="password">
    <button type="submit" name="submit">Sign in</button>
</form>
<a href="signup.php">Sign up</a>'; }
?>

<div id="main">
    <div id="message_area">

    <?php 

 

$q1 = "SELECT * FROM `message`" ;
$r1 = mysqli_query($conn, $q1) ;
while($row = mysqli_fetch_assoc($r1)) {
    $message = $row['message'] ;
    $user_id = $row['user_id'] ;
    echo '<h4 style="color:red">'.$user_id.'</h4> ';
    echo '<p>'.$message.'</p>' ;
}

if(isset($_POST['submit'])){
    $message = $_POST['message'];
    $q = 'INSERT INTO `message` (`id`, `message`, `user_id`)
    VALUES ("", "'.$message.'", "'.$_SESSION['user_id'].'")';

    if(mysqli_query($conn, $q)) {
        echo '<h4 style="color:red">'.$_SESSION['user_id'].'</h4>' ;
        echo '<p>'.$message.'</p>' ;
        echo '<hr>' ;
    }
}


?>

</div>
<form method="POST">
    <input type="text" name="message" style="width:370px; height:50px;" placeholder="Type message here" />
    <input type="submit" name="submit" style="width:70px; height:50px;" value="message" />


</div>


</body>
</html>