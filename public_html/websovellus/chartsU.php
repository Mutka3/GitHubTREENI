<!doctype html public "-//w3c//dtd html 3.2//en">
<html>
<head>
<title>User Pulse Data</title>

<style>

body, html {
  height: 100%;
}

.parallax { 
  /* The image used */
  background-image: url("img/header-bg.jpg");

  /* Full height */
  height: 100%; 

  /* Create the parallax scrolling effect */
  background-attachment: fixed;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}

</style>
</head>
<body class = "parallax">
<?Php
require "config.php";// Database connection

if($stmt = $connection->query("SELECT users.user_first AS usersFirst,
syke.data AS sykeData, syke.date AS sykeDate
FROM syke,users
WHERE syke.userID = users.user_id")){

  echo "No of records : ".$stmt->num_rows."<br><br>";
$php_data_array = Array(); // create PHP array
  echo "<table>
<tr> <th>User</th><th>Data</th><th>Date</th></tr>";
while ($row = $stmt->fetch_row()) {
   echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td></tr>";
   $php_data_array[] = $row; // Adding to array
   }
echo "</table><br><br>";
}else{
echo $connection->error;
}
//print_r( $php_data_array);
// You can display the json_encode output here. 
//echo json_encode($php_data_array); 

// Transfor PHP array to JavaScript two dimensional array 
echo "<script>
        var my_2d = ".json_encode($php_data_array)."
</script>";
?>


<div id="chart_div"></div>
<br><br>
<a href=https://www.plus2net.com/php_tutorial/chart-column-database.php>Column Chart from MySQL database</a>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {packages: ['corechart', 'bar']});
      google.charts.setOnLoadCallback(drawChart);
	  
      function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'User');
        data.addColumn('number', 'Pulse');
		data.addColumn('number', 'Date');
        for(i = 0; i < my_2d.length; i++)
    data.addRow([my_2d[i][0], parseInt(my_2d[i][1]),parseInt(my_2d[i][2])]);
       var options = {
          title: 'Pulse Data',
          hAxis: {title: 'Pulse Data',  titleTextStyle: {color: '#333'}},
          vAxis: {minValue: 0}
        };

        var chart = new google.charts.Bar(document.getElementById('chart_div'));
        chart.draw(data, options);
       }

       
	///////////////////////////////
////////////////////////////////////	
</script>
</body></html>







