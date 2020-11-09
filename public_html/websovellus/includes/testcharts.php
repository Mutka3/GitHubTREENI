<?php
session_start();
$email = strtolower($_POST['email']);
$pass = $_POST['pass'];

define("SQL_SERVER","mysql.metropolia.fi");
define("SQL_USER","mariamv");
define("SQL_PASS","A1793159357a");
$con = mysqli_connect(SQL_SERVER,SQL_USER,SQL_PASS) or die(mysql_error());
mysql_select_db("mariamv") or die(mysql_error());

$res = mysqli_query("SELECT * FROM tbl_sensors_data WHERE usermail = '$email'");
if (mysqli_num_rows($res)) {
    while($row = mysqli_fetch_array($res)) {
        if ($row['pass'] == md5($pass)) {
            foreach($row as $key=>$value){
                echo $key." : ".$value."<br>";
            }
        }else {
                echo "password wrong";
            }
        }
    } else {
        echo "email not found";
    }

?>


$usermail =  $_SESSION['u_email'];

 $sql = "SELECT sensors_temperature_data,
 UNIX_TIMESTAMP(CONCAT_WS('', sensors_data_date)) AS date
 FROM tbl_sensors_data WHERE usermail='$usermail'
 ORDER BY sensors_data_date DESC, sensors_data_time DESC ";

$query = $sql;