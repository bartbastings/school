<?php

$oefening = 12.2;

include('html_kop.inc.php');

echo "\n<h1>Oefening $oefening</h1>\n";
echo "\n<h2>Data voor MySQL</h2>";
//include('functie.inc.php');

stringtest();

function stringtest(){
	echo '<br/>Mail: '.$mail = 'test@test.test';
	echo '<br/>Naam: '.$naam = 'testnaam';
	echo '<br/>SID: '.$sid = session_id();
	echo '<br/>';
	echo '<br/>Nu-stamp: '.$nu = time();
	echo '<br/>Nu-tekst: '.$nu = date('Y-m-d H:i:s', $nu);
	echo '<br/>Nu-strtotume: '.strtotime($nu);
	echo '<br/>';
	echo '<br/>Pass: '.$wachtwoord = 'geheim';
	echo '<br/>Pass-MD5: '.md5($wachtwoord);
	echo '<br/>';
	echo '<br/>'.$test = '%raar &amp; \'een\' "string" achtig <strong>ding</strong>';
	echo '<br/>'.$test = schonestring($test);
}

function schonestring($string, $html= false){
	$string = trim($string);
	if(! $html){
		$string = strip_tags($string);
	}
	$string = mysql_real_escape_string($string);
	return $string;
}

include('html_staart.inc.php');

?>