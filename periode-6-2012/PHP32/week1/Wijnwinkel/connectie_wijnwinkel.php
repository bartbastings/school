<?php 
//1. Connectie maken: 
$db = mysql_connect("localhost","root","root")or die (mysql_error()); 

//2. Database selecteren: 
mysql_select_db("wijnwinkel") or die(mysql_error()); 


?>
