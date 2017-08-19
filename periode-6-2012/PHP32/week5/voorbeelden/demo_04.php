<?php
//1. Connectie maken: 
$db = mysql_connect("localhost","root", "root")or die (mysql_error()); 
//2. de hoofd array aanmaken waar alle data inkomt
$artikelen = array();
//2. Database selecteren: 
mysql_select_db("wijnwinkel") or die(mysql_error()); 
//3. De query opstellen
$query = 'SELECT omschrijving, land, soort, verkoopprijs, voorraad  FROM `artikel` ORDER BY artikelnummer ASC';
$query = 'SELECT * FROM artikel WHERE soort="Rood"';

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
echo json_encode(array('wijnwinkel'=>$artikelen));
?> 