<?php

$oefening = 11.1;

include('html_kop.inc.php');

echo "\n<h1>Oefening $oefening</h1>\n";
//echo "\n<h2>De klasse dier</h2>";
//include('functie.inc.php');

$paarden = array(
			1=>'Elmo',
			2=>'Mevrouw Aart',
			3=>'Allart',
			4=>'Joker',
			5=>'Jazz\'Junior'
);

$paard = array();
foreach($paarden as $id => $naam){
	$paard[$id]= new dier($id, $naam);
	$paard[$id]->handelingen();
	echo $paard[$id]->toon_formulieren();
	echo'<hr>';
	/*if($_POST[$id] == 'voeren'){
		$paard[$id]->voeren();
	}
	*/
}

/*
$elmo = new dier ('Elmo');
if($_POST['Elmo'] == 'voeren'){
	$elmo->voeren();
}
echo $elmo->toon_formulieren();

$allart = new dier('Allart');
if($_POST['Allart'] == voeren){
	$allart->voeren();
}
echo $allart->toon_formulieren();
*/

class dier{
	var $id;
	var $naam;
	var $voer= 'hooi';
	var $voerenperdag;
	var $gevoerd = 0;
	
	function __construct($id, $nm, $vpd =3){
		$this->id = $id;
		$this->naam = $nm;
		$this->voerenperdag = $vpd;
	}
	
	function handelingen(){
		if($_POST[$this->id] =='voeren'){
			$this->voeren();
		}
	}
	
	function voeren(){
		if($this->gevoerd < $this->voerenperdag){
			$this->gevoerd++;
		}
	}
	
	function toon_formulieren(){
		$regels .= '<h3>'.$this->naam.'</h3>
		<form action="" method="post"><ul>';
		$regels .= '<li>'.$this->formulier_voeren().'</li>';
		$regels .= '</ul></form>';
		return $regels;
	}
	
	function formulier_voeren(){
		$regels .='<p>Vandaag gevoerd: '.
		$this->gevoerd.
		' van '.$this->voerenperdag;
		if($this->gevoerd < $this->voerenperdag){
			$regels .=' <input type="submit" name="'.$this->id.'" 
			value="voeren" />: '.$this->voer;
		}
		$regels .='</p>';
		return $regels;
	}
}

class hond extends dier{
	var $uitlatenperdag;
	var $uitgelaten = 0;
	var $voer = 'brokken';
	
	function __construct($nm, $vpd = 3, $upd = 4){
		$this->naam = $nm;
		$this->voerenperdag = $vpd;
		$this->uitlatenperdag = $upd;
	}
	
	function uitlaten(){
		if($this->uitgelaten < $this->uitlatenperdag){
			$this->uitgelaten++;
		}
	}
	
	function toon_formulieren(){
		$regels = '<h3>'.$this->naam.'</h3>
					<form action="" method="post"><ul>';
		$regels .= '<li>'.$this->formulier_voeren().'</li>';
		$regels .= '<li>'.$this->formulier_uitlaten().'</li>';
		$regels .= '</ul></form>';
	}
}

include('html_staart.inc.php');

?>
