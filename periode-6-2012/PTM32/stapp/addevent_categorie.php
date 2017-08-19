
 <?php
	include("include.php");




	$query="SELECT * FROM soortevent ";
		$result = mysql_query($query) or die ("FOUT: " . mysql_last_error());
		$aantal = mysql_num_rows ($result);


	
	$query2="SELECT * FROM muziek ";
		$result2 = mysql_query($query2) or die ("FOUT: " . mysql_last_error());
		$aantal2 = mysql_num_rows ($result2);

	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<h1>Soort events</h1>

	<table border="1px">
<thead>
<tr><th>ID</th><th>Soort</th><th>Bewerken</th><th>Verwijder?</th></tr>
</thead>
	<?php

			while($row = mysql_fetch_array($result)){
				?>
					<tr>


			<td><?php echo $row['soort_id']; ?></a></td>
			<td><?php echo $row['soort_event']; ?> </td>
			<td><a href="afdelingbewerken.php?id=<?php echo $row['soort_id']; ?>">Bewerken</a></center></td>
			<td><center><a href="script_afdelingverwijderen.php?id=<?php echo $row['soort_id']; ?>" onclick="return confirm('Weet u zeker dat het bestand wilt verwijderen?')">Verwijderen</a></center></td>

		</tr>


<?php
	}
?>



  		</a></td>

</table>


<h1>Soort event Toevoegen</h1>



<?php
	








if(isset($_POST['verzend'] )){
 $POST1 = "INSERT INTO soortevent (soort_event) VALUES ('$_POST[sevent]')";
        mysql_query($POST1) or die(mysql_error());
		   


	
    }
  /*
			echo "Afdeling is toegevoegd";
			header('Location: afdelingbeheer.php');
		
			*/


?>











<form method="post" target="_self">
<table>


<tr><td>Soort event</td><td><input type="text" style="width: 250px;" name="sevent"></td></tr>









</select></td>


</table>

<input type="submit" name="verzend" value="Toevoegen">
</form>

<h1>Muziekgenres</h1>

	<table border="1px">
<thead>
<tr><th>ID</th><th>Muziek</th><th>Bewerken</th><th>Verwijder?</th></tr>
</thead>
	<?php

			while($row = mysql_fetch_array($result2)){
				?>
					<tr>


			<td><?php echo $row['id_muziek']; ?></a></td>
			<td><?php echo $row['muziek_genres']; ?> </td>
			<td><a href="afdelingbewerken.php?id=<?php echo $row['id_muziek']; ?>">Bewerken</a></center></td>
			<td><center><a href="script_afdelingverwijderen.php?id=<?php echo $row['id_muziek']; ?>" onclick="return confirm('Weet u zeker dat het bestand wilt verwijderen?')">Verwijderen</a></center></td>

		</tr>


<?php
	}
?>



  		</a></td>

</table>



<h1>Muziekgenres Toevoegen</h1>
<?php
	include("include.php");



if(isset($_POST['verzend2'] )){
 $POST1 = "INSERT INTO muziek (muziek_genres) VALUES ('$_POST[mevent]')";
        mysql_query($POST1) or die(mysql_error());
		   


	
    }
  /*
			echo "Afdeling is toegevoegd";
			header('Location: afdelingbeheer.php');
		
			*/


?>



<form method="post" target="_self">
<table>


<tr><td>Muziek event</td><td><input type="text" style="width: 250px;" name="mevent"></td></tr>









</select></td>


</table>

<input type="submit" name="verzend2" value="Toevoegen">
</form>
</body>
</html>