<?php

$oefening = 6.6;

include('html_kop.inc.php');

echo "\n<h1>Oefening $oefening</h1>\n";
echo "\n<h2>Conversies</h2>";

define("NAAM", "Bart Bastings");
$naam = NAAM;
echo "Dit is mijn naam: $naam";
echo "<br/>";
echo "Dit is mijn naam: NAAM";
echo "<br/>";
echo "Dit is mijn naam: ".NAAM;

/*
echo ": ".is_float(23.45);
echo "<br/>: ";
echo is_int(23);
echo "<br/>: ";
echo is_string(23);
echo "<br/>: ";
echo is_string("23");
echo "<br/>: ";
echo is_bool("true");
echo "<br/>: ";
echo is_bool(true);
*/

/*
$var = 23.45;
echo ": ".(float)$var;
echo "<br/>: ";
echo (int)$var;
/echo "<br/>: ";
echo (string)$var;
echo "<br/>: ";
echo (bool)$var;
echo "<br/>: ";
$var = (unset)$var;
echo $var;
*/

include('html_staart.inc.php');

?>