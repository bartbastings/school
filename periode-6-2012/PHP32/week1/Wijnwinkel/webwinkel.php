<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Wijnwinkel</title>
</head>
<body>
<?php 
session_start(); 
include ('connectie_wijnwinkel.php');
if(isset($_POST['bestellen'])){
    $artikelnr=$_POST['artikelnr'];
    $aantal=$_POST['aantal'];
    $_SESSION['winkelwagen'][$artikelnr]=$aantal;
    header ("Location: winkelwagen.php");
    exit;
}

// 3. Query opstellen
$query = 'SELECT * FROM `artikel` ORDER BY artikelnummer ASC';
// 4. Query uitvoeren
$result = mysql_query($query);

?>

<?php

echo '<h1>Wijnwinkel</h1>';

// 5. Resultaat verwerken


// hier begint de tabel, met alle eenheden bovenaan

echo '<table border=1>';
echo '<tr><td>Land</td><td>Wijn</td><td>Prijs</td><td>Voorraad</td><td>Aantal eenheden</td>';

while($row = mysql_fetch_array($result))
{
    if($row["voorraad"] < 0)
    {
        $voorraad=0;
    }
    else
    {
        $voorraad=$row["voorraad"];
    }

    echo '<tr><form name="artikel" action="'.$_SERVER['PHP_SELF'].'" method="POST">
	<td>'.$row["land"].'</td>
	<td>'.$row["omschrijving"].'</td>
	<td>'.$row["verkoopprijs"].'</td>
	<td>'.$voorraad.'</td>
	<td><input type="hidden" name="artikelnr" value="'.$row["artikelnummer"].'">
	<input type="text" name="aantal" value="1">
	<input type="submit" value="Bestel" name="bestellen"></td></form></tr>';
}
echo '</table>'
?>


</body>
</html>
