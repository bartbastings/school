<?php

$oefening = 8.3;

include('html_kop.inc.php');

echo "\n<h1>Oefening $oefening</h1>\n";
echo "\n<h2>Een array itereren</h2>";

$nm = array('Bart','Joost','Daan','Fons');

echo "Onze namen zijn:";
$namenlijst = mijn_naam($nm);
echo $namenlijst;

function mijn_naam($naam = array()){
	$regel = '<ul>';
	foreach($naam as $key => $value){
		$regel .="<li>$value</li>";
	}
	$regel .='</ul>';
	return $regel;
}

/*
$GLOBALS['nm'] = array('Bart','Joost','Daan','Fons');
mijn_naam();

function mijn_naam(){
	echo "Onze namen zijn:<ul>";
	foreach((array)$GLOBALS['nm'] as $key => $value){
		echo "<li>$value</li>";
	}
	echo '</ul>';
}
*/

/*
$nm = array('Bart','Joost','Daan','Fons');
mijn_naam();

function mijn_naam(){
	
	global $nm;
	
	echo "Onze namen zijn:<ul>";
	foreach((array)$nm as $key => $valeu){
		echo"<li>$valeu</li>";
	}
	echo'</ul>';
}
*/

/*
$nm = array('Bart','Joost','Daan','Fons');
mijn_naam($nm);

function mijn_naam($naam = array()){
	echo 'Onze namen zijn:<ul>';
	foreach($naam as $key => $valeu){
		echo"<li>$valeu</li>";
	}
	echo'</ul>';
}
*/

include('html_staart.inc.php');

?>