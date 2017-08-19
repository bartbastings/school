<?php

function form_inup(){
	return'<h1>Sign Up & In</h1>
	<a href="'.$_SERVER['SCRIPT_NAME'].'?signin">Sign In</a> of 
	<a href="'.$_SERVER['SCRIPT_NAME'].'?signup">Sign Up</a><br/>';
}

function form_in($gegevens = array()){
	$regels = '<h1>Sign In</h1>';
	$regels .= '<form name="signin" action="" method="post">';
	if(isset($gegevens['error_mail'])){
		$regels .= $gegevens['error_mail'].'<br/>';
	}
	$regels .= 'E-mailadres: 
				<input type="text" name="mail" value="'.$_POST['mail'].'"/><br/>';
	if(isset($gegevens['error_pass'])){
		$regels .= $gegevens['error_pass'].'<br/>';
	}
	$regels .= 'Wachtwoord: 
				<input type="password" name="pass" value=""/><br/>
				<input type="submit" name="in" value="Sign In Now"/><br/>';
	$regels .= '</form>';
	return $regels;
}

function form_up($gegevens = array()){
	$regels = '<h3>Sign Up</h3>';
	$regels .= '<form name="signup" action="" method="post">';
	if(isset($gegevens['error_mail'])){
		$regels .= $gegevens['error_mail'].'<br/>';
	}
	$regels .= 'E-mailadres: 
				<input type="text" name="mail" value="'.$_POST['mail'].'"/><br/>';
	if(isset($gegevens['error_naam'])){
		$regels .= $gegevens['error_naam'].'<br/>';
	}
	$regels .= 'Naam: 
				<input type="text" name="naam" value="'.$_POST['naam'].'"/><br/>';
	if(isset($gegevens['error_pass'])){
		$regels .= $gegevens['error_pass'].'<br/>';
	}
	$regels .= 'Wachtwoord: 
				<input type="password" name="pass1" value=""/><br/>
				Herhaal Wachtwoord: 
				<input type="password" name="pass2" value=""/><br/>
				<input type="submit" name="up" value="Sign Up Now"/><br/>';
	$regels .= '</form>';
	return $regels;
}

function signin(&$terug){
	$ok = true;
	if ($_POST['mail'] == ''){
		$terug['error_mail'] = 'Vul uw e-mailadres in.';
		$ok &= false;
	}
	if($_POST['pass'] == ''){
		$terug['error_pass'] = 'Vul uw wachtwoord in.';
		$ok &= false;
	}
	
	if($ok){
		// controleer gegevens in database
		// haal NAAM uit database
		if(true){
			return "NAAM";
		}
		else{
			$terug['error_mail'] = 'Gegevens niet correct';
			return false;
		}
	
	}
	else{
		return false;
	}
}

function signup(&$terug){
	$ok = true;
	if ($_POST['naam'] == ''){
		$terug['error_naam'] = 'Vul uw naam in.';
		$ok &= false;
	}
	if ($_POST['mail'] == ''){
		$terug['error_mail'] = 'Vul uw e-mail in.';
		$ok &= false;
	}
	if($_POST['pass'] == '' || $_POST['pass1'] != $_POST['pass2']){
		$terug['error_pass'] = 'Vul tweemaal hetzelfde wachtwoord in.';
		$ok &= false;
	}
	
	if($ok){
		// controleer in database of e-mail nog niet bestaat
		if(true){
			// maak nieuw record in database
			return true;
		}
		else{
			$terug['error_mail'] = 'E-mailadres al in gebruikt.';
			return false;
		}
	}
	else{
		return false;
	}
}

function maak_sessie($naam){
	$_SESSION['sid'] = session_id();
	$_SESSION['naam'] = $naam;
}

function vernietig_sesie(){
	session_unset();
	session_destroy();
	setcookie('PHPSESSID','',time()-3600,'./');
}

?>