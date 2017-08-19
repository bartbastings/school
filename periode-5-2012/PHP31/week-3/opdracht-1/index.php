<?php

$opdracht = 1;

include('html_kop.inc.php');

echo "\n<h1>Opdracht $opdracht</h1>\n";
echo "\n<h2>opdracht 1</h2>";

define("RET", "\r");

include('voorbeeld.php');

if(isset($_GET['bereken'])){
	echo even($_GET['getal']);
}

echo maak_form();

include('html_staart.inc.php');

?>