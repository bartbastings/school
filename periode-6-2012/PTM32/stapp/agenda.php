<?php  

include('include.php');


 
 
 session_start();
$user_id = $_SESSION['user_id'];
$email = $_SESSION['email'];
 
 if ($user_id == true){
	//echo 	$gebruiker ;
	
	echo "$email <a href='logout.php' class=\"loginout\">  Logout</a> ";
	}else{
	echo " <a href='main_login.php' class=\"loginout\" >Login please</a> ";
	}

 
 
// Query opstellen
$query = 'SELECT * FROM tbl_event, tbl_useragenda WHERE tbl_useragenda.event_id =  tbl_event.event_id AND tbl_useragenda.user_id ="'.$user_id.'"  ';

// Query uitvoeren
$result = mysqli_query($db,$query);



 
 
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

</head>
<body>
<?php

echo '<h1>Agenda</h1>';

// 5. Resultaat verwerken


// hier begint de tabel, met alle eenheden bovenaan

?>
<?php
while($row = mysqli_fetch_array($result))
{
	?>
    <form name="tbl_event" action="'.$_SERVER['PHP_SELF'].'" method="POST">
    <button><h1><?php echo $row['event_name']?></h1>
	<?php echo $row["event_start_date"]?>  <?php echo $row["event_start_time"]?>
    
  </button>
	<button><a href="script_agendaverwijder.php?id=<?php echo $row['event_id']?>">Verwijderen</a></button>
	<br/>
	
	</form></tr>
<?php
}


echo '</table>';
echo " <a href='geschiedenis.php'  >Geschiedenis</a> ";
echo " <a href='swap_evenementen.php'  >Back</a> ";
?>



<!--	<td><img src="image/'.$row["event_image"].'" alt="some_text"/></td>-->
</body>
</html>
