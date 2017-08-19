<?php

$opdracht = 2;

include('html_kop.inc.php');

echo "\n<h1>Opdracht $opdracht</h1>\n";
echo "\n<h2>opdracht2</h2>";

$zin1 = 'Rasmus Lerdorf is de maker van "PHP". ';
$zin2 = 'Hij ontwikkelde deze "server-side scripttaal" in 1994.';

echo $zin1. $zin2;

include('html_staart.inc.php');

?>