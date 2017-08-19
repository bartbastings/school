<?php

//1. Connectie maken: 
$db = mysql_connect("localhost","root","root")or die (mysql_error()); 
//2. de hoofd array aanmaken waar alle data inkomt
$artikelen = array();
//2. Database selecteren: 
mysql_select_db("wijnwinkel") or die(mysql_error()); 
//3. De query opstellen
$query = 'SELECT * FROM artikel';
// 4. Query uitvoeren
$result = mysql_query($query) or die(mysql_error());
// vraag het resultaat op als associatieve array
while($row = mysql_fetch_array($result, MYSQL_ASSOC))
{
  	//voeg elke rij toe aan de artikellen array:
    $artikelen[] = array('artikel' => $row);
}
header('Content-type: application/json');
// coderen als JSON:

$wijnwinkel = json_encode(array('wijnwinkel'=>$artikelen));

function maak_form(){
	$regel ='<form name="fac", method="GET", action="./opdracht_3.php">'.RET.
			'Choice: '.RET.
			'<input type="submit" name="soort" value="Rood"/>'.RET.
			'<input type="submit" name="land" value="Spanje"/>'.RET.
			'<input type="submit" name="both" value="Both"/>'.RET.
			'</form>'.RET;
			return $regel;
}

function soort($soort){
 
$db = mysql_connect("localhost","root","root")or die (mysql_error()); 
$artikelen = array();
mysql_select_db("wijnwinkel") or die(mysql_error()); 
$query = 'SELECT * FROM artikel WHERE soort="Rood"';
//$query = 'SELECT * FROM artikel WHERE land="Spanje"';
$result = mysql_query($query) or die(mysql_error());
while($row = mysql_fetch_array($result, MYSQL_ASSOC))
{
    $artikelen[] = array('artikel' => $row);
}
header('Content-type: application/json');

$wijnwinkel = json_encode(array('wijnwinkel'=>$artikelen));
	return $wijnwinkel;
}

function land($land){
	
$db = mysql_connect("localhost","root","root")or die (mysql_error()); 
$artikelen = array();
mysql_select_db("wijnwinkel") or die(mysql_error()); 
$query = 'SELECT * FROM artikel WHERE land="Spanje"';
$result = mysql_query($query) or die(mysql_error());
while($row = mysql_fetch_array($result, MYSQL_ASSOC))
{
    $artikelen[] = array('artikel' => $row);
}
header('Content-type: application/json');

$wijnwinkel = json_encode(array('wijnwinkel'=>$artikelen));
	return $wijnwinkel;
}


?>