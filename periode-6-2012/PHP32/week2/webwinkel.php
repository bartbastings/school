<?php 
//ORGINEEL
session_start(); 
include 'connectie_wijnwinkel.php';
$teller = 0;
if(isset($_POST['bestellen'])){
	$teller++;
    $artikelnr=$_POST['artikelnr'];
            $aantal=$_POST['aantal'];
			if(is_numeric($aantal)){
				if($aantal == ''){
					exit;
					}
					else{
						$_SESSION['winkelwagen'][$artikelnr]=$aantal;
						header ("Location: winkelwagen.php");
						exit;
					}
			}
			else{
				$aantal = "vul nummerieke waarde";
			}
}


// 3. Query opstellen
$query = 'SELECT * FROM `artikel` ORDER BY artikelnummer ASC';
// 4. Query uitvoeren
$result = mysql_query($query);


//var $alert maar daardoor komt het als een string eruit, en niet als een warning. ik heb later de code verbetert zodat hij wel goed uitvoerbaar wordt
/*
$alert = '<script>alert("Ik kan de code uitvoeren");</script>';


function strip(){
	$text = "<script language=javascript>alert('Ik kan de code uitvoeren.')</script>";
	
	$alert = strip_tags($text);
	
	return $alert;	
}

function htmlspec(){
	$text = "<script language=javascript>alert('Ik kan de code uitvoeren.')</script>";
	
	$alert = htmlspecialchars($text);
	
	return $alert;
}

function htmlent(){
	
	$text = "<script language=javascript>alert('Ik kan de code uitvoeren.')</script>";
	
	$alert = htmlentities("<script language=javascript>alert('Ik kan de code uitvoeren.')</script>");
	
	return $alert;
}
*/

// hier zie je niet de script text
//echo strip();

// hier zie je alles van de script
//echo htmlspec();

/*
echo "<script language=javascript>alert('Ik kan de code uitvoeren.')</script>";
*/

//echo htmlent();

//echo $alert;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Wijnwinkel</title>
</head>
<body>

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
// ik rijg een foutmelding als ik de script direct in brengt. Hij herkent de script dan niet. Daarom heb ik een var aangemaakt van alert om hem zonder syntax fouten in te brengen.

// als ik geen getal invoer gaat appilcartie gewoon door, dus je moet dan 0 euro betalen.
    echo '<tr><form name="artikel" action="'.$_SERVER['PHP_SELF'].'" method="POST"><td>'.$row["land"].'</td><td>'.$row["omschrijving"].'</td><td>'.$row["eenheid"].'</td><td>'.$voorraad.'</td><td><input type="hidden" name="artikelnr" value="'.$row["artikelnummer"].'"><input type="text" name="aantal" value="1"><input type="submit" value="Bestel" name="bestellen"></td></form></tr>';
}
echo '</table>'

?>

</body>
</html>
