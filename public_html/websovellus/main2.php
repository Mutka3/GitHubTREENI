<?php
    
    session_start();
    
?>



<?php
if (isset($_SESSION['u_id'])) {

  echo '

<head>
    <title>GoldMind</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="boxcss.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">

<div id="header">
        GOLDMIND
    </div>

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
            <a class="btn1" href="#">
                <i class="fas fa-home"></i>
            </a>
        </div>

        <h2>Welcome </h2>
        <div id="yellow">
            <a class="btn" href="loggedinpage.php">
                <i class="fas fa-book-medical"></i>
            </a>
        </div>

        <div id="grey">
            <a class="btn" href="maindata.php">
                <i class="fas fa-heartbeat"></i></i>
            </a>
        </div>

        <div id="brown">
            <a class="btn" href="mainchart">
                <i class="fas fa-chart-bar"></i>
            </a>
        </div>
        <div id="violet">
            <a class="btn" href="webchat.php">
                <i class="far fa-comments"></i>
            </a>
        </div>
    </div>
    ';







} else {

    echo '<head>
    <title>GoldMind</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="boxcss.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">

</head>

<body>

    <div id="header">
        GOLDMIND
    </div>

    <div class="pikkul">
    
        <div class="login-box">
            <h1>Login</h1>
       

            <form action="includes/login.inc.php" method="POST">
         <div class="textbox"> 
         <i class="fa fa-user" aria-hidden="true"></i>    
        <input type="text" name="uid" placeholder="Username/e-mail">
        </div>
        <div class="textbox"> 
        <i class="fa fa-lock" aria-hidden="true"></i>
        <input type="password" name="pwd" placeholder="password">
        </div>
    
        <input class="butn" type="submit" name="submit" value="Sign In">
    </form>
    
    <button class="openbtn" onclick="openForm()">Click Here to Sign Up</button>
</div>
    <div id="myOverlay" class="overlay">
    <span class ="closebtn" onclick="closeForm()" title="Close Overlay"> &#215 </span>
    <div class="wrap">
    <h2> Sign up Here</h2>
    <form class="signup-form" action="includes/signup.inc.php" method="POST">
            <input type="text" name="first" placeholder="Firstname">
            <input type="text" name="last" placeholder="Lastname">
            <input type="text" name="email" placeholder="E-mail">
            <input type="text" name="uid" placeholder="Username">
            <input type="password" name="pwd" placeholder="Password">
            <button class="signbtn" type="submit" name="submit">Sign up</button>
        </form>
    </div>
    </div>


<script>
function openForm() {
    document.getElementById("myOverlay").style.display="block";
}
</script>

<script>
function closeForm() {
    document.getElementById("myOverlay").style.display="none";
}
</script>


</div>
</div>
</div>






';
}

?>

<!DOCTYPE html>
<html>


<div id="footer"></div>
</body>

</html>