<?php

$opdracht = 8;

include('html_kop.inc.php');

echo "\n<h1>Opdracht $opdracht</h1>\n";
echo "\n<h2>opdracht8</h2>";

$temperatuur = mt_rand(-300, 100);
$bd = 'boodschap: ';

echo $temperatuur.'<br/>';

if($temperatuur < -273){
	echo $bd.'dat kan dus niet';
}
elseif ($temperatuur < 0){
	echo $bd.'het vriest';
}
elseif($temperatuur >35){
	echo $bd.'heet!';
}
elseif($temperatuur >=0){
	echo $bd.'prima weertje!';
}

include('html_staart.inc.php');

?>