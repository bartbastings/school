<?php  
/*session_start();
if(isset($_POST['bestellen'])){
    $artikelnr=$_POST['artikelnr'];
            $aantal=$_POST['aantal'];
		
            $_SESSION['winkelwagen'][$artikelnr]=$aantal;
			
				if (!empty ($aantal)){
					header ("Location: winkelwagen.php");
					exit;
			}else{
			header ("Location: webwinkel.php");
			
			}
          
}*/
include('include.php');

 session_start();

 $user_id = $_SESSION['user_id'];
 
  //$locatie = $_SESSION['caf_naam'];
  
   $date = date("d-m-Y");
// Query opstellen
$query = 'SELECT * FROM tbl_event WHERE event_start_date="'.$date.'"ORDER BY event_id ASC';

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

$perpage = 1;



if(isset($_GET['id'])){
    $start = $_GET['id'];
}else{
    $start = 0;
}
$TotalRec = mysql_num_rows(mysql_query("SELECT * FROM tbl_event"));
$select1 = "SELECT * FROM tbl_event WHERE tbl_event.event_start_date = '$date'  LIMIT $start, $perpage";

$result1 = mysql_query($select1) or die(mysql_error());
while($rows = mysql_fetch_array($result1))
{
	
	?>
    <form method="POST" action="script_like.php">
    
    	<p><?php echo $rows['event_id'] ?></p>
        <input type="text" name="enventid" value="<?php echo $rows['event_id']; ?>" />
        <p><?php echo $rows['event_name'] ?></p>
        <input type="hidden" name="eventname" value="<?php echo $rows['event_name']; ?>" />
        <img src="image/<?php echo $rows["event_image"]?>" alt="some_text"/>
      
        
        <input type="hidden" name="number" value="<?php echo $start; ?>" />
        <input type="submit" value="Like">
        
        </form>
<?php

echo $start;
	}
?>


<?php




    echo "<a href=\"./swap_evenementen.php?id=" . ($start + 1) . "\">Previous &laquo;</a>";


?>




</body>
</html>
