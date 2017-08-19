<?php

$oefening = 9.2;

include('html_kop.inc.php');

echo "\n<h1>Oefening $oefening</h1>\n";
echo "\n<h2>De funties toontijd() en toondatum()</h2>";

include('functie.inc.php');

echo 'UNIX-tijd: '.maakstraks(120).'<br/>';
echo 'Tijd: '.toontijd(time()).'<br/>';
echo 'Datum: '.toondatum(time()).'<br/>';

include('html_staart.inc.php');

?>