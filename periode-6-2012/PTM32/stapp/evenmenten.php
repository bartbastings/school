<?php  

include('include.php');

 session_start();

  
 
  $locatie = $_SESSION['caf_naam'];
  
  
  if ($locatie == true){
	//echo 	$gebruiker ;
	
	echo "<a href='logout.php' class=\"loginout\">  Logout</a> ";
	}else{
	echo " <a href='main_login.php' class=\"loginout\" >Login please</a> ";
	}
// Query opstellen
$query = 'SELECT * FROM `tbl_event` WHERE event_cafe="'.$locatie.'"ORDER BY event_id ASC';

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

echo '<h1>Evenmenten</h1>';

// 5. Resultaat verwerken


// hier begint de tabel, met alle eenheden bovenaan

echo '<table border=1>';
echo '<tr><td>Event</td><td>Soort</td><td>Poster</td><td>Leuk</td>';

while($row = mysqli_fetch_array($result))
{
    echo '<tr><form name="tbl_event" action="'.$_SERVER['PHP_SELF'].'" method="POST">
	<td>'.$row["event_name"].'</td>
	<td>'.$row["event_type"].'</td>
	<td><img src="image/'.$row["event_image"].'" alt="some_text"/></td>
	
	</form></tr>';

}
echo '</table>';

?>

<a href="addevent.php">
   <input type="button" value="Event Aanmaken" />
</a>


</body>
</html>
