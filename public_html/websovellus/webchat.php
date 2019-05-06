
<?php
    
    session_start();
?>

<?php
if (isset($_SESSION['u_id'])) {
  echo '
<?php
include("includes/db.inc.php");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Gold Mind Chat</title>
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
<script>

$(document).ready(function(e) {
    function displayChat() {

    $.ajax({
        url: "displayChat",
        type: "POST",
        success: function(data) {
            $("#chatDisplay").html(data);
        }
    });
}
    setInterval(function() {displayChat();}, 1000);

    $("#sendMessageBtn").click(function(e) {

        var name = $("#user_name").val();
        var message = $("#message").val();
        $("#myChatForm")[0].reset();

        $.ajax({
            url:"includes/sendChat.php",
            type: "POST",
            data: {
                uname:name,
                umessage:message
            }
        });
    });
});

window.setInterval(function() {
    var elem = document.getElementById("chatBox");
    elem.scrollTop = elem.scrollHeight;
  }, 5500);

</script>
</head>
<style>
   /* @media only screen and (max-width: 1000px) {*/


#chatBox {
    font-size: 15px;
    width: 80%; 
    margin-top: 3px;
    background: rgba(0,0,0,0.5);
    text-align: left;
    border: solid black;
   
    
}
 

#myChatForm {
    width: 30%;
    display: inline-block;
    margin: auto;
}
#user_name {
    width: 30%;
    padding: 4px;
    font-size: 20px;
    border: none;
    border-radius: 5px;
}

#message {
    width: 100%;
    padding: 4px;
    font-size: 20px;
    border-radius: 5px;
    border: none;
}


/*}*/
/*@media only screen and (orientation: landscape) {
        body {
            background-image: none;
            background-color: lightblue;
        }
    }
    @media screen and (min-width: 600px) {
        h3 {
            font-size: 55px;
        }
        p{
            font-size: 25px;
        }
    }
*/
</style>
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
    <div class="container-fluid">
        <h3 class="text-center">Gold Mind Chat</h3>
            <div class="well" id="chatBox">
                <div id="chatDisplay"></div>
            </div>
    
    <form id="usernm">
    <input type="text" id="user_name" placeholder="Enter your name:" >
    </form>
    
            <form id="myChatForm">
                   <!-- <input type="text" id="user_name" placeholder="Enter your name:">--> <br>
                    <textarea name="message" id="message" placeholder="Enter your message here..." cols="30" rows="2"></textarea> <br>
                    <button type="button" class="btn1" id="sendMessageBtn"> <i class="fas fa-paper-plane"></i></button>
            </form>

            
    </div>
    
    <div id="footer"></div>
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

