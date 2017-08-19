<?php

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
		return "De faculteit van $n = ".faculteit($n).".</br>".RET;
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

?>