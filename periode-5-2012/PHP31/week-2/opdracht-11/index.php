<?php

$opdracht = 11;

include('html_kop.inc.php');

echo "\n<h1>Opdracht $opdracht</h1>\n";
echo "\n<h2>Welkom</h2>";

//ini_set('display_errors',1)
//ini_set('error_reporting', E_ALL);

$page = $_GET['Exit'];

echo '<p>klik <a href="opdracht11exit.php">$page</a> voor URL</p>';

// INIT
$naam = $_POST["naam"];
$wachtwoord = $_POST["wachtwoord"];
$commentaar = $_POST["commentaar"];
$datum = $_POST["datum"];

// controller
if(isset($_POST['wissen'])){
	//wissrn
	unset($_POST);
}
elseif(isset($_POST['versturen'])){
	//versturen
	echo "<p>Je naam is $naam</p>";
	echo "<p>De datum is $datum</p>";
	echo "<p>Je commentaar was: <br> $commentaar </p>";	
}

//view
$formulier ='<form name="bericht" method="post" action="./opdracht11.php">';
$formulier.='<br/>';
$formulier .='voornaam:<input type="text" name="naam">';
$formulier .='<br/>';
$formulier .='datum:<input type="datetime" name="datum">';
$formulier .='<br/>';
$formulier .='wachtwoord:<input type="password" name="wachtwoord">';
$formulier .='<br/>';
$formulier .='commentaar:<textarea name="commentaar" rows="5"cols="30"></textarea>';

// knoppen
$formulier .='<br/><br/>'.
			 '<input type="submit" name="versturen" value="Versturen"/>  '.
			 '<input type="submit" name="wissen" value="Wissen"/>'.
			 '</form>';

echo $formulier;

include('html_staart.inc.php');

?>