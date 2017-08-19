<?php

$oefening = 6.7;

include('html_kop.inc.php');

echo "\n<h1>Oefening $oefening</h1>\n";
echo "\n<h2>Reeksen</h2>";

$stelletjes = array ("Jan"=>"Marie","Piet"=>"Leonie",23=>"niemand");

echo "waarde Marie: ".in_array("Marie", $stelletjes)."<br/>";
echo "waarde Jan: ".in_array("Jan", $stelletjes)."<br/>";
echo "sleutel Marie: ".array_key_exists("Marie", $stelletjes)."<br/>";
echo "sleutel Jan: ".array_key_exists("Jan", $stelletjes)."<br/>";
echo "sleutel \"23\": ".array_key_exists("23", $stelletjes)."<br/>";
echo "steutel 23: ".array_key_exists(23, $stelletjes)."<br/>";
echo "aantal: ".count($stelletjes);

/*
foreach($stelletjes as $key => $value){
	echo "Verkering: ".$key." - ".$value."<br/>";
}

echo "<br/>";

echo "--asort<br/>";
asort($stelletjes);
foreach($stelletjes as $key => $value){
	echo "Verkering: ".$key." - ".$value." - ".is_string($key)."<br/>";
	}

echo "<br/>";

echo "--ksort<br/>";
ksort($stelletjes);
foreach($stelletjes as $key => $value){
	echo "Verkering: ".$key." - ".$value." - ".is_string($key)."<br/>";
	}
*/

/*
$leeg = array();
$drinken = array("bier","cola","cassis","sinas");
foreach($drinken as $key => $value){
	echo "Drankje: ".$key."-".$value."<br/>";
}
*/

/*
$leeg = array();
$drinken = array("bier","cola","cassis","sinas");
echo "Drinken[6]= ".(bool)$drinken[6];
echo "<br/>";
echo "Drinken[2]= ".(bool)$drinken[2];
*/

/*
$leeg = array();
$drinken = array("bier","cola","cassis","sinas");
$drinken[] = "jenever";
$drinken[2]= "water";
echo $drinken[0]." - ".$drinken[1]." - ".$drinken[2]." - ".$drinken[3]." - ".$drinken[4];
*/

/*
$leeg = array();
$drinken = array("bier","cola","cassis","sinas");
echo $drinken;
echo "<br/>";
echo $drinken[3];
*/

include('html_staart.inc.php');

?>