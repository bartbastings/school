<?php

$opdracht = 1;

include('html_kop.inc.php');

echo "\n<h1>Opdracht $opdracht</h1>\n";
echo "\n<h2>opdracht1</h2>";

$voornaam = 'Ahrend';
$achternaam = 'Dreverhaven';
$adres = 'Dorpsstraat 108';
$email = '<a href="a.dreverhaven@hotmail.com">a.dreverhaven@hotmail.com</a>';
$website = '<a href="www.dreverhaven.nl">www.dreverhaven.nl</a>';

echo $voornaam;
echo '<br/>';
echo $achternaam;
echo '<br/>';
echo $adres;
echo '<br/>';
echo $email;
echo '<br/>';
echo $website;

include('html_staart.inc.php');

?>