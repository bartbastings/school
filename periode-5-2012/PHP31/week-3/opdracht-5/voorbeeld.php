<?php

function maak_form(){
	$regel ='<form name="fac", method="GET", action="./opdracht5.php">'.RET.
			'Jaar in cijfers: '.RET.
			'<input type="number" name="geboortejaar" value=""/><br/><br/>'.RET.
			'Maand in cijfers: '.RET.
			'<input type="number" name="maanden" value=""/><br/><br/>'.RET.
			'Week in cijfers: '.RET.
			'<input type="number" name="weken" value=""/><br/><br/>'.RET.
			'Dag in cijfers: '.RET.
			'<input type="number" name="dagen" value=""/><br/><br/>'.RET.
			'Uren in cijfers: '.RET.
			'<input type="number" name="uren" value=""/><br/><br/>'.RET.
			'Minuten in cijfers: '.RET.
			'<input type="number" name="minuten" value=""/><br/><br/>'.RET.
			'Seconden in cijfers: '.RET.
			'<input type="number" name="seconden" value=""/><br/><br/>'.RET.
			'<input type="submit" name="bereken" value="OK"/>'.RET.
			'</form>'.RET;
			return $regel;
}

function geboortejaar($geboortejaar){
	echo 'Jaren tot nu: ';
	if(is_numeric($geboortejaar)){
		if(strlen($geboortejaar) <= 4){
			if($geboortejaar >= 000){
				if($geboortejaar < 2011){
					$nu = date('Y') - $geboortejaar;
					echo "$nu";
					}
					else{
						echo'Jaartal te hoog';
					}
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

function maanden($maanden){
	echo 'Maanden tot nu: ';
	if(is_numeric($maanden)){
		if(strlen($maanden) <= 2){
			if($maanden >= 0 && $maanden <= 12){
					$nu = date('n')- $maanden;
					echo "$nu";
				}
				else{
					echo'Maand nummer bestaat niet';
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

function weken($weken){
	echo 'Weken tot nu: ';
	if(is_numeric($weken)){
		if(strlen($weken) <= 2){
			if($weken >= 1 && $weken <= 52){
					$nu = date('W') - $weken;
					echo "$nu";
				}
				else{
					echo'Week nummer bestaat niet';
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

function dagen($dagen){
	echo 'Dagen tot nu: ';
	if(is_numeric($dagen)){
		if(strlen($dagen) <= 3){
			if($dagen >= 1 && $dagen <= 365){
					$nu = date('z') - $dagen;
					echo "$nu";
				}
				else{
					echo'Dagnummer bestaat niet';
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

function uren($uren){
	echo 'Uren tot nu: ';
	if(is_numeric($uren)){
		if(strlen($uren) <= 2){
			if($uren>= 0 && $uren <= 24){
					$nu = date('G') - $uren;
					echo "$nu";
				}
				else{
					echo'Uur bestaat niet';
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

function minuten($minuten){
	echo 'Minuten tot nu: ';
	if(is_numeric($minuten)){
		if(strlen($minuten) <= 2){
			if($minuten>= 00 && $minuten <= 59){
					$nu = date('i') - $minuten;
					echo "$nu";
				}
				else{
					echo'Minuten bestaat niet';
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

function seconden($seconden){
	echo 'Seconden tot nu: ';
	if(is_numeric($seconden)){
		if(strlen($seconden) <= 2){
			if($seconden>= 00 && $seconden <= 59){
					$nu = date('s') - $seconden;
					echo "$nu";
				}
				else{
					echo'Seconden bestaat niet';
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