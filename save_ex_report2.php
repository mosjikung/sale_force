<?php
session_start();
include 'connect.php';

$_POST['username'] = $_SESSION['username'];


echo $strSQL  = "UPDATE example set appt2 = '".$_POST['app']."', who_appt2 = '".$_POST['username']."' where ex_id = '".$_GET['ex_id']."'";
$objQuery = mysqli_query($objCon,$strSQL);

date_default_timezone_set("Asia/Bangkok");
	$time = date('Y-m-d H:i:s');
	$_POST["time"] = $time;
	$event = "save_update_example2";
	$_POST["event"] = $event;


	include 'connect.php';
	$strSQL = "INSERT INTO log_file (log_username,log_event,log_date) VALUES ('".$_POST["username"]."','".$_POST["event"]."','".$_POST["time"]."')";
	$objQuery = mysqli_query($objCon,$strSQL);

 ?>
 <?php
 if($objQuery)
 {
 	?>

 			<?php
   if($_SESSION["level"] == "admin"){

    ?>
    <script>
    alert('Complete');
    location.href='admin_page.php';
    </script>
    <?php

 }elseif($_SESSION["level"] == "supervisor"){
   ?>

   <script>
   alert('Complete');
   location.href='leader_page.php';
   </script>
   <?php

   }elseif($_SESSION["level"] == "manager"){
     ?>

     <script>
     alert('Complete');
     location.href='manager_page.php';
     </script>
     <?php
 }elseif($_SESSION["level"] == "sec"){
   ?>

   <script>
   alert('Complete');
   location.href='sec_page.php';
   </script>
   <?php
 }elseif($_SESSION["level"] == "officer"){
   ?>

   <script>
   alert('Complete');
   location.href='user_page.php';
   </script>
   <?php
 }else{
 	header("location:index.php");
 	echo "not success";
 }
 }
 mysqli_close($objCon);
 ?>
