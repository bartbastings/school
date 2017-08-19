<?php

$oefening = 6.4;

include('html_kop.inc.php');

echo "\n<h1>Oefening $oefening</h1>\n";
echo "\n<h2>Booleans</h2>";

$nietes = 50>60;
$welles = 50<60;
echo "Niet: ".$nietes;
echo "<br/>";
echo "Wel: ".$welles;

include('html_staart.inc.php');

?>