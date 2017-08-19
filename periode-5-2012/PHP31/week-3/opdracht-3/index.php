<?php

$opdracht = 3;

include('html_kop.inc.php');

echo "\n<h1>Opdracht $opdracht</h1>\n";
echo "\n<h2>opdracht 3</h2>";

define("RET", "\r");

include('voorbeeld.php');

if(isset($_POST['bereken'])){
	echo wachtwoord($_POST['wachtwoord']);
}

echo maak_form();

include('html_staart.inc.php');

?>
