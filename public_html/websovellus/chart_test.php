
<?php
include("includes/db.inc.php");
//search 
$search = $conn->real_escape_string($_POST['search']);

 //Query the database
 $resultSet = $conn->query("SELECT users.user_first AS usersFirst,
 syke.data AS sykeData 
 FROM syke,users
 WHERE users.user_first = '$search' AND syke.userID = users.user_id");

 while ($rows = $resultSet->fetch_assoc())
 {
     $make = $rows['usersFirst'];
     $model = $rows['sykeData'];

     $output .= "<p>Make: $make<br />Model:$model</p>";
 }
 $query = "SELECT Date_time, Tempout FROM alarm_value"; // select column
    $aresult = $conn->query($query);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Massive Electronics</title>
    <script type="text/javascript" src="loder.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});

        google.charts.setOnLoadCallback(drawChart);
        function drawChart(){
            var data = new google.visualization.DataTable();
            var data = google.visualization.arrayToDataTable([
                ['Date_time','Tempout'],
                <?php
                    while($row = mysqli_fetch_assoc($aresult)){
                        echo "['".$row["Date_time"]."', ".$row["Tempout"]."],";
                    }
                ?>
               ]);

            var options = {
                title: 'Date_time Vs Room Out Temp',
                curveType: 'function',
                legend: { position: 'bottom' }
            };

            var chart = new google.visualization.AreaChart(document.getElementById('areachart'));
            chart.draw(data, options);
        }

    </script>
</head>
<body>
     <div id="areachart" style="width: 900px; height: 400px"></div>
</body>
</html>