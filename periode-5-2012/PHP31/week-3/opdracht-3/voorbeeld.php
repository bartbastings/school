<?php

function maak_form(){
	$regel ='<form name="fac", method="GET", action="./opdracht3.php">'.RET.
			'Wachtwoord: '.RET.
			'<input type="password" name="wachtwoord" value=""/><br/><br/>'.RET.
			'<input type="submit" name="bereken" value="OK"/>'.RET.
			'</form>'.RET;
			return $regel;
}

function wachtwoord($wachtwoord){
	if($wachtwoord === 'secret'){
		echo 'Datum: '.date('d-m-y').'<br/>';
		echo 'Tijd: '.date('H:i:s');
	}
	else{
		echo 'not authorized';
	}
	
	echo '<br/><br/>';
}

?>