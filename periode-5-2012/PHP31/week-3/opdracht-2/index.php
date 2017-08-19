<?php

$opdracht = 2;

include('html_kop.inc.php');

echo "\n<h1>Opdracht $opdracht</h1>\n";
echo "\n<h2>opdracht 2</h2>";

define("RET", "\r");

include('voorbeeld.php');

if(isset($_GET['bereken'])){
	echo voornaam($_GET['voornaam']);
	echo achternaam($_GET['achternaam']);
	echo geboortejaar($_GET['geboortejaar']);
}

echo maak_form();

include('html_staart.inc.php');

?>
