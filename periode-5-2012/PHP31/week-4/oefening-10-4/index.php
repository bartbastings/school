<?php

//controller
session_start();
$sessie = false;
$form = '';

if(isset($_POST['signout'])){
	include_once('signinup.inc.php');
	vernietig_sessie();
}

if(isset($_SESSION['sid']) && $_COOKIE['PHPSESSID'] == $_SESSION['sid']){
	$sessie = true;
	$form = form_out();
	
}

if(!$sessie){
	include_once('signinup.inc.php');
	if(isset($_POST['in'])){
		$controleer = signin($fouten);
		if($controleer === false){
			$form = form_in($fouten);
		}
		else{
			maak_sessie($controleer);
			$sessie = true;
			$form = form_out();
		}
	}
	elseif(isset($_POST['up'])){
		if(!signup($fouten)){
			$form = form_up($fouten);
		}
		else{
			maak_sessie($_POST['naam']);
			$sessie = true;
			$form = form_out();
		}
	}
	elseif(isset($_GET['signin'])){
		$form = form_in();
	}
	elseif(isset($_GET['signup'])){
		$form = form_up();
		}
	else{
		$form = form_inup();
	}
}

// Functies
function form_out(){
	return '<div><form name="signup" action="./" method="post">
			<input type="submit" name="signout" value="Sign Out Now"/>
			</form></div>';
}

//view
$hoofdstuk = 10.4;
include('html_kop.inc.php');
echo "<h1>Oefening $hoofdstuk</h1>";

if ($sessie){
	echo 'Gebruiker: '.$_SESSION['naam'];
}
else{
	echo 'website niet ingelod';
}
echo $form;

include('html_staart.inc.php')

?>