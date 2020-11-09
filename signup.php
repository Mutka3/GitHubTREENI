<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Chilld</title>
  <meta name="keywords" content="">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

  <meta property="og:title" content="">
  <meta property="og:type" content="website">
  <meta property="og:url" content="">
  <meta property="og:site_name" content="">
  <meta property="og:description" content="">

  <!-- Styles -->
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/animate.css">
  <link rel="stylesheet" href="css/styles.css">
  <link href='http://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900|Montserrat:400,700'
    rel='stylesheet' type='text/css'>


  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/main.css">

  <script src="js/modernizr-2.7.1.js"></script>

</head>

<body>


  <div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="logo" href="index.php"><img src="img/logo.svg" alt="Logo"></a>
      </div>
      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#pricing" class="scroll">Palvelut</a></li>
          <li><a href="#">Sign in</a></li>
        </ul>
      </div>
      <!--/.navbar-collapse -->
    </div>
  </div>

  <header>
    <div class="container">
      <div class="row">
        <div class="col-xs-6">
          <a href="index.php"><img src="img/logo.svg" alt="Logo"></a>


        </div>
        <div class="col-xs-6 signin text-right navbar-nav">
          <!--<a href="#pricing" class="scroll">Palvelut</a>&nbsp; &nbsp;<a href="#">Sign in</a>-->
          
          <?php
            if(isset($_SESSION['u_id'])) {
                echo '<form action="includes/logout.inc.php" method="POST">
                <button type="submit" name="submit">Logout</button>
            </form>';

            } else {
                echo'<form action="includes/login.inc.php" method="POST">
                <input type="text" name="uid" placeholder="Username/e-mail">
                <input type="password" name="pwd" placeholder="password">
                <button type="submit" name="submit">Sign in</button>
            </form>
            <a href="signup.php">Sign up</a>';            }
        ?>

        </div>
      </div>






<!-- signup -->

    <section class="main-container">
    <div class="main-wrapper">
        <h2>Sign up</h2>
        <form class="signup-form" action="includes/signup.inc.php" method="POST">
            <input type="text" name="first" placeholder="Firstname">
            <input type="text" name="last" placeholder="Lastname">
            <input type="text" name="email" placeholder="E-mail">
            <input type="text" name="uid" placeholder="Username">
            <input type="password" name="pwd" placeholder="Password">
            <button type="submit" name="submit">Sign up</button>
        </form>

    </div>
     </section>

    
</body>
</html>