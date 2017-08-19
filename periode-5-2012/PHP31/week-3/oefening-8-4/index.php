<?php

$oefening = 8.4;

include('html_kop.inc.php');

echo "\n<h1>Oefening $oefening</h1>\n";
echo "\n<h2>Recursieve functie voor de faculiteit</h2>";

define("RET", "\r");

include_once('functie.inc.php');

if(isset($_GET['bereken'])){
	echo geef_fac($_GET['n']);
}
echo maak_form();

/*
//functies
function maak_form(){
	$regel ='<form name="fac", method="GET", action="./oefening8.4.php">'.RET.
			'<input type="text" name="n" value=""/>'.RET.
			'<input type="submit" name="bereken" value="Faculteit !"/>'.RET.
			'</form>'.RET;
			return $regel;
}

//if(is_integer($n) && $n >= 0 && $n <= 170){
function geef_fac($n=0){
	if($n >= 0 && $n <= 170){
		return "De faculteit van $n = ".faculteit($n).".<br/>".RET;
	}
	else{
		return "De faculteit van $n kan niet berekend worden.<br/>".RET;
	}
}

function faculteit($n = 0){
	if($n >= 1){
		return $n * faculteit($n - 1);
	}
	else{
		return 1;
	}
}
*/

/*
$n =6;
echo "De faculteit van $n = ".faculteit($n).".";

function faculteit($n = 0){
	if($n >= 1){
		return $n * faculteit($n - 1);
	}
	else{
		return 1;
	}
}
*/

include('html_staart.inc.php');

?>