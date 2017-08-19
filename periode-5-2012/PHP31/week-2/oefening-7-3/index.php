<?php

$oefening = 7.3;

include('html_kop.inc.php');

echo "\n<h1>Oefening $oefening</h1>\n";
echo "\n<h2>Yahze</h2>";

// INIT
$worp =1;
$laatsteworp =3;
$stenen = array(0, 0, 0, 0, 0);

// controller
if(isset($_POST['opnieuw'])){
	//opnieuw beginnen
	unset($_POST);
}
elseif(isset($_POST['dobbelen'])){
	//dobbelen
	for($i=0; $i<=4; $i++){
		$stenen[$i] = (int)$_POST['steen_'.$i];
		
		if(!isset($_POST['vast_'.$i])){
			//als steen niet is vastgezet: dobbelen
			$stenen[$i] = mt_rand(1,6);
		}
	}
	//volgende worp
	$worp = $_POST['worp']+1;
}

//view
$formulier = '<form name="stenen" method="post" action="./oefening7.3.php">';

for($i=0; $i<=4; $i++){
	$formulier .=
		'<input type="hidden" name="steen_'.$i.'" '.'value="'.$stenen[$i].'"/>';
	$formulier .='Steen '.($i+1).':<strong>'.$stenen[$i].'</strong>';
	
	if($worp>1){
		$formulier .=
			'&nbsp;&nbsp;&nbsp'.
			'<input type="checkbox" name="vast_'.$i.'"';
			
			if(isset($_POST['vast_'.$i])){
				$formulier .=' checked="checked"';
			}
			$formulier .='/><small>vastzetten</small>';
	}
	$formulier .='<br/>';
}

$formulier .='<br/>';

// knop voor nogmaals dobbelen
if($worp <= $laatsteworp){
	$formulier .=
		'<input type="submit" name="dobbelen" value="Nu werpen: '.$worp.'"/>';
}
else{
	$formulier .='Bepaald de eindscore';
}

//formulier afsluiten
$formulier .=
	'<br/><br/>'.
	'<input type="hidden" name="worp" value="'.$worp.'"/>'.
	'<input type="submit" name="opnieuw" value="Opnieuw" />'.
	'</form>';

echo $formulier;

include('html_staart.inc.php');

?>