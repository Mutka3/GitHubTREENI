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

      <div class="row header-info">
        <div class="col-sm-10 col-sm-offset-1 text-center">
          <h1 class="wow fadeIn">
          <?php
            if (isset($_SESSION['u_id'])) {
                echo " You are loged in and now you can do stuff and see stuff ";
            } else {
             echo ' <h1 class="wow fadeIn">A free landing page theme </h1>';
            }
        ?>
          </h1>
          <br />
          <p class="lead wow fadeIn" data-wow-delay="0.5s">
          Lorem ipsum dolor sit amet, consectetur adipis. <br>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit sit dol mi arlna.
          </p>
          <br />

          <div class="row">
            <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
              <div class="row">
                <div class="col-xs-6 text-right wow fadeInUp" data-wow-delay="1s">
                  <a href="#be-the-first" class="btn btn-secondary btn-lg scroll">Learn More</a>
                </div>
                <div class="col-xs-6 text-left wow fadeInUp" data-wow-delay="1.4s">
                  <a href="#invite" class="btn btn-primary btn-lg scroll">Request Invite</a>
                </div>
              </div>
              <!--End Button Row-->
            </div>
          </div>

        </div>
      </div>
    </div>
  </header>