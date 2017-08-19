<?php
$oefening = 3;

include('html_kop.inc.php');

echo "\n<h1>Opdracht $oefening</h1>\n";

echo "\n<h3>JSON output op basis van de wijnwinkel</h3>\n";

define("RET", "\r");

include('functie.inc.php');

if(isset($_GET['soort'])){
	echo soort($_GET['soort']);
}

if(isset($_GET['land'])){
	echo land($_GET['land']);
}

if(isset($_GET['both'])){
	echo soort($_GET['soort']).land($_GET['land']);
}


echo maak_form();



include('html_staart.inc.php');
?>
