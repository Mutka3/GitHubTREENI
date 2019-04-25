<?php
include("includes/db.inc.php");
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Gold Mind Chat</title>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link href='https://fonts.googleapis.com/css?family=Capriola' rel='stylesheet'>
<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Lato" />
<link rel="stylesheet" href="css/chat.css">
<script>

$(document).ready(function(e) {
    function displayChat() {

    $.ajax({
        url: 'displayChat',
        type: 'POST',
        success: function(data) {
            $("#chatDisplay").html(data);
        }
    });
}
    setInterval(function() {displayChat();}, 1000);

    $('#sendMessageBtn').click(function(e) {

        var name = $("#user_name").val();
        var message = $("#message").val();
        $("#myChatForm")[0].reset();

        $.ajax({
            url:'includes/sendChat.php',
            type: 'POST',
            data: {
                uname:name,
                umessage:message
            }
        });
    });
});

window.setInterval(function() {
    var elem = document.getElementById('chatBox');
    elem.scrollTop = elem.scrollHeight;
  }, 5500);

</script>
</head>
<style>
    @media only screen and (max-width: 1000px) {


#chatBox {
    font-size: 35px;
    width: 100%; 
    margin-top: 30px;
}



#myChatForm {
    width: 100%;
    display: inline-block;
    margin: auto;
}
#user_name {
    width: 100%;
    padding: 20px;
    font-size: 35px;
}

#message {
    width: 100%;
    padding: 20px;
    font-size: 35px;
}

#sendMessageBtn
{
    font-size: 35px;
}

}
@media only screen and (orientation: landscape) {
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

</style>
<body>
    
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
                    <button type="button" class="btn btn-success btn-lg" id="sendMessageBtn">Send Message</button>
            </form>
    </div>
    </body>
    </html>