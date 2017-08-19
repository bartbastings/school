<?php

function maak_form(){
	$regel ='<form name="fac", method="GET", action="./opdracht7.php">'.RET.
			'Kies je naam: '.RET.
			'<input type="submit" name="bereken" value="OK"/>'.RET.
			'<input type="submit" name="wissen" value="Wissen"/>'.RET.
			'</form>'.RET;
			return $regel;
}

function namen($namen){
	$nm = array('Bart','Joost','Daan','Fons');
	echo "Onze namen zijn:";
	$namenlijst = mijn_naam($nm);
	echo $namenlijst;
}

function mijn_naam($naam = array()){
	$regel = '<ul>';
	foreach($naam as $key => $value){
		$regel .="<li>$value</li>";
	}
	$regel .='</ul>';
	return $regel;
}

?>