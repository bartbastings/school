<?php

$oefening = 11.2;

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
	$paard[$id]= new paard($id, $naam);
	$paard[$id]->handelingen();
	echo $paard[$id]->toon_formulieren();
	echo'<hr>';
	/*if($_POST[$id] == 'voeren'){
		$paard[$id]->voeren();
	}
	*/
}

$pippie = new hond('Pippie');
$pippie->handelingen();
echo $pippie->toon_formulieren();

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
	var $voer;
	var $voerenperdag;
	var $gevoerd = 0;
	var $activiteiten = array();
	
	function __construct($id, $nm, $vpd =3){
		$this->id = $id;
		$this->naam = $nm;
		$this->voerenperdag = $vpd;
	}
	
	function handelingen(){
		foreach($this->activiteiten as $key => $actie){
			if($_POST[$this->id] =='voeren'){
				call_user_func('self::'.$actie);
			}
		}
		/*
		if($_POST[$this->id] =='voeren'){
			$this->voeren();
		}
		*/
	}
	
	function voeren(){
		if($this->gevoerd < $this->voerenperdag){
			$this->gevoerd++;
		}
	}
	
	function toon_formulieren(){
		//$regels .= '<h3>'.$this->naam.'</h3>
		$regels .= '<h3>'.get_class($this).' : '.$this->naam.'</h3>
		<form action="" method="post"><ul>';
		foreach($this->activiteiten as $key => $actie){
			$regels .='<li>'.call_user_func('self::formulier_'.$actie).'</li>';
		}
		/*
		$regels .= '<li>'.$this->formulier_voeren().'</li>';
		*/
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
	var $activiteiten = array('voeren', 'uitlaten');
	
	function __construct($nm, $vpd = 1, $upd = 4){
		$this->id = $id;
		$this->naam = $nm;
		$this->voerenperdag = $vpd;
		$this->uitlatenperdag = $upd;
	}
	
	function uitlaten(){
		if($this->uitgelaten < $this->uitlatenperdag){
			$this->uitgelaten++;
		}
	}
	
	function formulier_uitlaten(){
		$regels .='<p>Vandaag uitgelaten: '.
		$this->uitgelaten.
		' van: '.$this->uitlatenperdag;
		if($this->uitgelaten < $this->uitlatenperdag){
			$regels .='<input type="submit" name="'.$this->id.'" 
			value="uitlaten"/>';
		}
		$regels .='</p>';
		return $regels;
	}
	
	/*
	function toon_formulieren(){
		$regels = '<h3>'.$this->naam.'</h3>
					<form action="" method="post"><ul>';
		$regels .= '<li>'.$this->formulier_voeren().'</li>';
		$regels .= '<li>'.$this->formulier_uitlaten().'</li>';
		$regels .= '</ul></form>';
	}
	*/
}

class paard extends dier{
	var $voer = 'hooi';
	var $activiteiten = array('voeren');
}

// test
/*
class tsss{
	function __construct(){
		call_user_func('self::testen', 'Wat ');
	}
	
	function testen($arg){
		echo $arg.'werkt';
	}
}
$ding = new tsss();
*/

include('html_staart.inc.php');

?>