<?php



include("includes/db.inc.php");

    $query = "SELECT * FROM chatroom";
    $run = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_array($run)) {

    

?>
  
        <p>
        <span style="color: #4caf50;"><?php echo $row['name']. ":";?> </span>
        <span style="color: white;"><?php echo $row['message'];?> </span>
        <span style="color: #ADD8E6; float:right;"><?php echo $row['time'];?> </span>
        </p>

       <?php }



?>