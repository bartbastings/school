<?php

$oefening = 8.2;

include('html_kop.inc.php');

echo "\n<h1>Oefening $oefening</h1>\n";
echo "\n<h2>Experimenten met parameters</h2>";

mijn_naam('Bart','Joost');

function mijn_naam($voornaam ='',$achternaam ='Bastings'){
	echo 'Voornaam: '.$voornaam.'<br/>';
	echo 'Achternaam: '.$achternaam.'<br/>';
}

/*
mijn_naam();

function mijn_naam($naam = 'Bart Bastings'){
	echo "Mijn is $naam";
}
*/

/*
$naam = 'Bart Bastings';
mijn_naam($naam);
echo '<br/>'.$naam;

function mijn_naam(&$naam){
	echo "Mijn naam is $naam.";
	$naam = 'Joost';
}
*/

/*
$naam = 'Bart Bastings';
mijn_naam($naam);
echo '<br/>'.$naam;

function mijn_naam($naam){
	echo "Mijn naam is $naam.";
	$naam = 'Joost';
}
*/

include('html_staart.inc.php');

?>