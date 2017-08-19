<?php

$opdracht = 4;

include('html_kop.inc.php');

echo "\n<h1>Opdracht $opdracht</h1>\n";
echo "\n<h2>opdracht 4</h2>";

define("RET", "\r");

include('voorbeeld.php');

if(isset($_GET['bereken'])){
	echo macht($_GET['totaal']);
	echo derdemacht($_GET['getal']);
}

echo maak_form();

include('html_staart.inc.php');

?>