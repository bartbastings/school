<?php
	
	
	
	include('include.php');
	 
 session_start();
	$user_id = $_SESSION['user_id'];
	$id = $_GET['id'];

	
	$POST1 = "INSERT INTO tbl_useragenda (user_id, event_id) VALUES('$user_id', '$event_id' )";
	
	mysql_query($POST1) or die(mysql_error());
	
	
	$POST2 = "UPDATE tbl_event SET event_likes = event_likes + 1 WHERE event_id='$event_id'";
		 
		
	mysql_query($POST2) or die(mysql_error());	
   
    header('Location:  geschiedenis.php')


?>