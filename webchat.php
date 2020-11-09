<?php

include("includes/db.inc.php");
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Chilld Chat</title>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

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

</script>
</head>

<body>
    
<div class="container-fluid">
    <h3 class="text-center">Live Chilld Chat</h3>
        <div class="well" id="chatBox">
            <div id="chatDisplay"></div>
        </div>
        <form id="myChatForm">
                <input type="text" id="user_name" placeholder="Enter your name:"> <br>
                <textarea name="message" id="message" placeholder="Enter your message here..." cols="30" rows="2"></textarea> <br>
                <button type="button" class="btn btn-success btn-lg" id="sendMessageBtn">Send Message</button>
        </form>
</div>
</body>
</html>