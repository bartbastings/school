<?php

// de postcode moet met 4 cijfers beginnen en eindigen met 2 hoofdletters
function validate_postcode($postcode){
	if (preg_match("#^[0-9]{4}+\s{1}+[A-Z]{2}$#",$postcode,$match)){
		return "Valide postcode:".$match[0]."<br/>";
	}
	else{
		return "geen valide postcode<br />";
	}
	
}

//de email moet beginnen met een willekeurig teken, dan moet er een keer een @ er in staan. En als laatste de emial moet eindigen met com of nl. 
function validate_email($email){
	if (preg_match("#^.+@{1}.+.(com|nl)$#", $email, $match)) {
		return "Valide email:".$match[0]."<br />";
		}
	else{
		return "geen valide email<br />";
	}
}

//de functie controleert of er geen white space ertussen staat. Als dat match ie het geen valide wachtwoord
function validate_wachtwoord($wachtwoord){
	if (!preg_match("#\s#", $wachtwoord, $match)) {
		return "Valide wachtwoord:".$match[0]."<br />";
		}
	else{
		return "geen valide wachtwoord<br />";
	}
}

?>