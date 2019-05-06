<?php



/*check if submitted*/
if (isset($_POST['submitted'])) {
    include("includes/db.inc.php");
//create variables = post from form field 
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$time = $_POST['time'];
//$lname = date('Y-m-d H:i:s'); // Convert string to date format.
//var for database
$sqlinsert = "INSERT INTO tbl_sensors_data (sensors_temperature_data, sensors_data_date, sensors_data_time) VALUES ('$fname', '$lname', '$time') ";
//
if(!mysqli_query($conn, $sqlinsert)) {
die('error inserting new record');
}//end of nested if statement

$newrecord = "1 record added to database";

}//end of main statement

?>


<!DOCTYPE html>
<html>

<head>
    <title>GoldMind</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="boxcss.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">

    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    

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

<form id ="heartdata" method="post" action="dataForMain.php">
<input type="hidden" name="submitted" value="true" />
<fieldset>

<legend>Add New Heart Rate Data</legend>
<label>Heart rate (bpm): <input type="text" name="fname" /></label>
<label>Date: <input placeholder="yyyy-mm-dd" type="text" name="lname" /></label>
<label>Time: <input placeholder="hh:mm:ss" type="text" name="time" /></label>
</fieldset>
<br>
<input type="submit" value="add new data" />
</form>

<?php 
echo $newrecord
?>

</div>
</div>    
</body>

</html>