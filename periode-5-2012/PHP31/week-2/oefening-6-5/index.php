<?php

$oefening = 6.5;

include('html_kop.inc.php');

echo "\n<h1>Oefening $oefening</h1>\n";
echo "\n<h2>Vergelijkingen</h2>";

echo ": ";
echo 50>60 || 50>40;
echo "<br/>: ";
echo 50>60 && 50>40;
echo "<br/>: ";
echo 50>60 xor 50>40 xor 60>40;
echo "<br/>: ";
echo 50>60 || 50>40 || 60>40;

include('html_staart.inc.php');

?>