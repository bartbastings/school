<?php

function maak_form() {
	$regel ='<form name="fac", method="GET", action="./opdracht1.php">'.RET.
			'<input type="text" name="getal" value=""/>'.RET.
			'<input type="submit" name="bereken" value="OK"/>'.RET.
			'</form>'.RET;
			return $regel;
}

function even($getal) {
	if(is_numeric($getal)){
		if($getal % 2 == 0){
		return "$getal: is een even nummer";
	}
	else{
		return "$getal: is een oneven nummer";
	}
	}
	else{
		return "Fout: $getal is geen numerieke waarde";
	}
}

?>