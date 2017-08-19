<?php

$opdracht = 8;

include('html_kop.inc.php');

echo "\n<h1>Opdracht $opdracht</h1>\n";
echo "\n<h2>opdracht 7</h2>";

define("RET", "\r");

include('voorbeeld.php');

if(isset($_GET['bereken'])){
	echo tekst($_GET['com']);
}
elseif(isset($_GET['wissen'])){
	unset($_GEt);
}

echo maak_form();

include('html_staart.inc.php');

?>