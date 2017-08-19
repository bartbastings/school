<?php

$host = "localhost";
$user = "root";
$passwd = "root";
$dbname = "stapp";
$cxn = mysql_connect ($host,$user,$passwd,$dbname) 
or die ("geen connectie");

mysql_select_db($dbname) 
or die ("Kan data base niet selecteren");


// Connectie maken: 
$db = mysqli_connect("localhost","root", "root","stapp"); 
// Check connectie
if (mysqli_connect_errno($db))
  {
  echo "Connectie met de database mislukt: " . mysqli_connect_error();
  }




?>