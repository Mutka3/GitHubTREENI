<?php
session_start();



//for displaying search form first
//$output = NULL;

//if the search submit button is pressed the do following
//if(isset($_POST ['submit']))
//{
include 'db.inc.php';


//search 
//$search = $conn->real_escape_string($_POST['search']);


//$query = '("SELECT tbl_sensors_data.usermail AS usersFirst,
 //tbl_sensors_data.sensors_temperature_data AS sykeData , UNIX_TIMESTAMP(CONCAT_WS(" ", sensors_data_date, sensors_data_time)) AS datetime
 //FROM tbl_sensors_data,users
 //WHERE users.user_email = "$username" AND users.user_email = tbl_sensors_data.usermail")';


 //$query = "
 //SELECT sensors_temperature_data,
 //UNIX_TIMESTAMP(CONCAT_WS(" ", sensors_data_date, sensors_data_time)) AS datetime, usermail
 //FROM tbl_sensors_data WHERE usermail = "$usermail"
 //ORDER BY sensors_data_date DESC, sensors_data_time DESC ";
$usermail =  $_SESSION['u_email'];

 $sql = "SELECT sensors_temperature_data,
 UNIX_TIMESTAMP(CONCAT_WS('', sensors_data_date)) AS date
 FROM tbl_sensors_data WHERE usermail='$usermail'
 ORDER BY sensors_data_date DESC, sensors_data_time DESC ";

$query = $sql;

 //Query the database
 //$resultSet = $conn->query("SELECT users.user_first AS usersFirst,
 //syke.data AS sykeData 
 //FROM syke,users
 //WHERE users.user_first = '$search' AND syke.userID = users.user_id");


 $result = mysqli_query($conn, $query);
 $rows = array();
 $table = array();
 
 $table['cols'] = array(
  array (
   'label' => 'Date Time', 
   'type' => 'date'

  ),
  array(
   'label' => 'Heart rate (bpm)', 
   'type' => 'number'
  )
 );

 while ($row = mysqli_fetch_array($result))
 {

 //

     $sub_array = array();
 $date = explode(".", $row["date"]);
 $sub_array[] =  array(
      "v" => 'Date(' . $date[0] . '000)'
     );
 $sub_array[] =  array(
      "v" => $row["sensors_temperature_data"]
     );
 $rows[] =  array(
     "c" => $sub_array
    );
}
$table['rows'] = $rows;
$jsonTable = json_encode($table);
 




?>

 <form method ="POST">
 <input type="TEXT" name="search" />
 <input type="SUBMIT" name="submit" value="Search" />
 </form>



<!DOCTYPE html>
<html>

<head>
    <title>GoldMind</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../boxcss.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">

    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
    


    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript">

    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

        
        var data = new google.visualization.DataTable(<?php echo $jsonTable; ?>);

        var options = {
            title: 'Sensors Data',
            legend: {
                position: 'bottom'
            },
            chartArea: {
                width: '95%',
                height: '65%'
                
            }
           
        };

        var chart = new google.visualization.LineChart(document.getElementById('line_chart'));

        chart.draw(data, options);
    }
    </script>
    <style>
    .page-wrapper {
        width: 1000px;
        margin: 0 auto;
    }
    </style>

</head>

<body>

    <div id="header">
        GOLDMIND
    </div>
<div>
    <div class="pikkul">
        <div id="green">
            <form action="includes/logout.inc.php" method="POST">
                <button type="submit" name="submit">
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
<?php 
echo $row
?>
        <div class="page-wrapper">
            <br />
            <h2 text-align="center" color= "white">Your heart rate chart  <?php echo $usermail?>  </h2>
            <div id="line_chart" style="width: 100%; height: 500px"></div>
        </div>
        <?php echo $sql?>
</div>
     
</body>

</html>