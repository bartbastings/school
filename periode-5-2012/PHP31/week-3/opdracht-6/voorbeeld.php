<?php

function maak_form(){
	$regel ='<form name="fac", method="GET", action="./opdracht6.php">'.RET.
			'Gok je gek: '.RET.
			'<input type="submit" name="bereken" value="Gok"/>'.RET.
			'</form>'.RET;
			return $regel;
}

function jackpot($jackpot){
	$gok1 = randLetter();
	$gok2 = randLetter();
	$gok3 = randLetter();
	echo "Letters three of a kind: $gok1 - $gok2 - $gok3";
	if ($gok1 === $gok2 && $gok2 === $gok3){
		echo '<br/><br/>Jackpot!';
	}
	echo '<br/><br/>';
}

function randLetter(){
	$int = rand(0,2);
	$a_c = "abc";
	$rand_letter = $a_c[$int];
	return $rand_letter;
}

?>