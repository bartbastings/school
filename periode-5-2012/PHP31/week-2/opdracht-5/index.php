<?php

$opdracht = 5;

include('html_kop.inc.php');

echo "\n<h1>Opdracht $opdracht</h1>\n";
echo "\n<h2>opdracht5</h2>";

$zin = 'Wiki Loves Monuments: Fotografeer een monument voor Wikipedia en win!';

echo 'a) '.($zin).'<br/>';
echo 'b) '.strlen($zin).'<br/>';
echo 'c) '.strtoupper($zin).'<br/>';
echo 'd) '.strtolower($zin).'<br/>';
echo 'e) '.$zin=strtolower(strtoupper($zin)).'<br/>';
echo 'f) '.($zin1=str_replace("monument","aardappel",$zin)).'<br/>';
echo 'g) '.strrev($zin);

include('html_staart.inc.php');

?>