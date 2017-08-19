<?php

$opdracht = 5;

include('html_kop.inc.php');

echo "\n<h1>Opdracht $opdracht</h1>\n";
echo "\n<h2>opdracht 5</h2>";

define("RET", "\r");

include('voorbeeld.php');

if(isset($_GET['bereken'])){
	echo geboortejaar($_GET['geboortejaar']);
	echo maanden($_GET['maanden']);
	echo weken($_GET['weken']);
	echo dagen($_GET['dagen']);
	echo uren($_GET['uren']);
	echo minuten($_GET['minuten']);
	echo seconden($_GET['seconden']);
}

echo maak_form();

include('html_staart.inc.php');

?>