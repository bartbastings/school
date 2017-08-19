<?php

$oefening = 9.3;

include('html_kop.inc.php');

echo "\n<h1>Oefening $oefening</h1>\n";
echo "\n<h2>Handige informatie</h2>";

include('functie.inc.php');

echo 'UNIX-tijd: '.maakstraks(120).'<br/>';
echo 'Tijd: '.toontijd(time()).'<br/>';
echo 'Datum: '.toondatum(time()).'<br/>';
echo toontijdinfo(time());

include('html_staart.inc.php');

?>