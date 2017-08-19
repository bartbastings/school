<?php session_start();
include 'connectie_wijnwinkel.php';
if (isset($_POST['DEL']))
{
	unset ($_SESSION['winkelwagen'][$_POST['DEL']]);
}
if (isset($_POST['verderwinkelen']))// hier wordt je weer doorgestuurd naar de webwinkel
{
	header ("Location: webwinkel.php"); //webwinkel.php is de pagina waarop besteld kan worden
	exit;
}
if (isset($_POST['plaatsbestelling']))
{
	header ("Location: bestelling.php"); //bestelling.php wordt later uitgewerkt
	exit;
}
			
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Winkelwagen</title>
</head>
<body>
<h1>Winkelwagen</h1>
<?php


if (!empty($_SESSION['winkelwagen']))
{
      echo ("<table border=0><tr><td>naam</td><td>aantal</td><td>prijs</td><td>totaal</td></tr>");
      $totaalbestelling=0;
      foreach($_SESSION['winkelwagen'] as $artikelnr => $aantal)
      {
            $query = 'SELECT * FROM `artikel` WHERE `artikelnummer` = '.$artikelnr;
            $result = mysql_query($query);
				
	// Als er resultaten zijn ingevuld
             $row = mysql_fetch_array($result);
             echo ("<tr><td>".$row["omschrijving"]."</td>
						<td>".$aantal."</td>
						<td>".$row["verkoopprijs"]."</td>
						<td>".$totaalprijs=($row["verkoopprijs"]*$aantal)."</td>");
						
             echo ("<td><a href=\"?DEL=$artikelnr\"> Verwijder </a></td></tr>");
             
      }
	  $totaalbestelling+=$totaalprijs;
	//dan laat hij die resultaten zien
     echo ("<tr><td>totaalprijs bestelling</td><td></td><td></td><td>".$totaalbestelling."</td></tr></table>");

      echo ('<form name="eindbestel" action="'.$_SERVER['PHP_SELF'].'" method="POST"> 
	  <input type="submit" value="Verder winkelen" name="verderwinkelen"> 
	  <input type="submit" value="Plaats bestelling" name="plaatsbestelling"> </form>');
}
else{
       echo ("Uw winkelwagen is momenteel leeg.");
       echo ('<form name="leeg" action="'.$_SERVER['PHP_SELF'].'" method="POST"> 
	   <input type="submit" value="Verder winkelen" name="verderwinkelen"> </form>');
}
?>
        
</body>
</html>