<?php 
//ORGINEEL
//1. Connectie maken: 
$db = mysql_connect("localhost","bart", "php6")or die (mysql_error()); 

//2. Database selecteren: 
mysql_select_db("wijnwinkel") or die(mysql_error()); 
?>
