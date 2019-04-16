<?php

//for displaying search form first
$output = NULL;

//if the search submit button is pressed the do following
if(isset($_POST ['submit']))
{
include 'db.inc.php';

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

}


?>

 <form method ="POST">
 <input type="TEXT" name="search" />
 <input type="SUBMIT" name="submit" value="Search" />
 </form>

<?php echo $output; ?>

