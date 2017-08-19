<?php  

include('include.php');

 session_start();

 
 
  $locatie = $_SESSION['user_id'];
// Query opstellen
$query = 'SELECT * FROM `tbl_event` ORDER BY event_id ASC';

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

echo '<h1>geschiedenis</h1>';

// 5. Resultaat verwerken


// hier begint de tabel, met alle eenheden bovenaan

echo '<table border=1>';
echo '<tr><td>Event</td><td>Soort</td><td>Poster</td><td>Leuk</td>';

while($row = mysqli_fetch_array($result))
{
	?>
    <tr><form name="tbl_event" action="'.$_SERVER['PHP_SELF'].'" method="POST">
	<td><?php echo $row['event_id']?></td>
    <td><?php echo $row['event_name']?></td>
	<td><?php echo $row["event_type"]?></td>
	<td><?php echo $row["event_cafe"]?></td>
	<td><?php echo $row["event_start_date"]?></td>
	<td><a href="gelike_script.php?id=<?php echo $row['event_id']?>">Like</a></td>


	
	</form></tr>
<?php

}
echo '</table>';

?>



</body>
</html>
