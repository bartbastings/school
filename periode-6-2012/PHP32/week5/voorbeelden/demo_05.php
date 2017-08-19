<?php
//1. Connectie maken: 
$db = mysql_connect("localhost","root", "root")or die (mysql_error()); 
//2. de hoofd array aanmaken waar alle data inkomt
$artikelen = array();
//2. Database selecteren: 
mysql_select_db("wijnwinkel") or die(mysql_error()); 

$filename = "acteurs.json";
$handle = fopen($filename,"r");
$content = fread($handle, filesize($filename));
fclose($handle);

$contentArr = json_decode($content, true);
foreach ($contentArr as $key => $value) {
				
			$surname = mysql_escape_string($value[0]);
			$lastname = mysql_escape_string($value[1]);
			$show = mysql_escape_string($value[3]);
			$pay = mysql_escape_string($value[2]);
			$type = mysql_escape_string($value[4]);
			// inser ignore: als er dubbele waardes al in de database staan dan wordt de rij niet toegevoegd.
			// dit werkt alleen als je de dubbele velden als primary key hebt gedefinieerd in je database (bijv. surname, lastname, show) 
			$query="INSERT IGNORE INTO actors VALUES ('$surname', '$lastname', '$show', '$pay', '$type')";	
			//echo $query . "<br>";	
			$result = mysql_query($query) or die(mysql_error());
}
mysql_close($db);
?> 