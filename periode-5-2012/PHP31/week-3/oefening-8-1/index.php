<?php

$oefening = 8.1;

include('html_kop.inc.php');

echo "\n<h1>Oefening $oefening</h1>\n";
echo "\n<h2>Een eenvoudige functie</h2>";

mijn_naam();

function mijn_naam(){
	echo 'Mijn naam is Bart Bastings';
}

include('html_staart.inc.php');

?>