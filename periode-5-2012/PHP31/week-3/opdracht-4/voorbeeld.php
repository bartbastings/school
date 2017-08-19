<?php

function maak_form(){
	$regel ='<form name="fac", method="GET", action="./opdracht4.php">'.RET.
			'Getal Derdemacht: '.RET.
			'<input type="number" name="getal" value=""/><br/><br/>'.RET.
			'<input type="submit" name="bereken" value="OK"/>'.RET.
			'</form>'.RET;
			return $regel;
}

function derdemacht($getal){
	echo 'Derdemacht: ';
	if(is_numeric($getal)){
		$totaal = ($getal* $getal* $getal);
		echo "$totaal";
	}
	else{
		echo 'voer een getal in';
	}
	echo '<br/><br/>';
}

function macht($totaal){
	$getal = 3;
	$aantal =4;
	$totaal =($getal* $getal* $getal* $getal);
	echo "Derdemacht($getal,$aantal)= $totaal<br/><br/>";
}

/*
function geef_macht($totaal){
	echo macht($getal);
}

function macht(){
	$getal = 3;
	$aantal = 4;
	if($aantal >=1){
		return $getal* $getal($aantal-1);
	}
	else{
		return 1;
	}

}
*/

?>