<?php
 
function maak_form(){
	$regel ='<form name="fac", method="GET", action="./opdracht2.php">'.RET.
			'Voornaam: '.RET.
			'<input type="text" name="voornaam" value=""/><br/><br/>'.RET.
			'Achternaam: '.RET.
			'<input type="text" name="achternaam" value=""/><br/><br/>'.RET.
			'Geboortejaar'.RET.
			'<input type="datetime" name="geboortejaar" value=""/><br/><br/>'.RET.
			'<input type="submit" name="bereken" value="OK"/>'.RET.
			'</form>'.RET;
			return $regel;
}

function voornaam($voornaam){
	echo 'Naam: ';
	if(is_numeric($voornaam)){
		echo 'Voornaam alleen letters/ ';
	}
	else{
		echo (ucfirst($voornaam)).' ';
	}

}

function achternaam($achternaam){
	if(is_numeric($achternaam)){
		echo '/Achternaam alleen letters<br/><br/>';
	}
	else{
	echo (ucfirst($achternaam)).'<br/><br/>';
	}
}

function geboortejaar($geboortejaar){
	echo 'Geboortejaar: ';
	if(is_numeric($geboortejaar)){
		if(strlen($geboortejaar) <= 4){
			if($geboortejaar > 1900){
				echo $geboortejaar;
				}
				else{
					echo'Jaartal te laag';
					}
		}
		else{
			echo'teveel nummers';
		}
	}
	else{
	echo 'geen nummerieke waarde';
	}
	echo '<br/><br/>';
}

?>