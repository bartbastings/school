<?php
	
	
	
	include('include.php');
	 
 session_start();
	$user_id = $_SESSION['user_id'];
	$id = $_GET['id'];

	
	$query1 = "DELETE FROM tbl_useragenda WHERE event_id='$id' AND user_id='$user_id'";
	mysql_query($query1) or die("Error, probeer het opnieuw.");
	
	
	$POST2 = "UPDATE tbl_event SET event_likes = event_likes - 1 WHERE (event_id='$event_id')";
		 
		
	mysql_query($POST2) or die(mysql_error());	
   
    header('Location:  agenda.php')


?>