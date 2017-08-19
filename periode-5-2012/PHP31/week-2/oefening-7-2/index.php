<?php

$oefening = 7.2;

include('html_kop.inc.php');

echo "\n<h1>Oefening $oefening</h1>\n";
echo "\n<h2>Driemaal werpen met de dobbelsteen</h2>";

$een = 23;
$twee = 54;
$drie = "23";

echo "== ".($een == $twee);
echo "<br/>";
echo "!= ".($een != $twee);
echo "<br/>";
echo "! ".!($een == $twee);
echo "<br/>";
echo "== ".($een == $drie);
echo "<br/>";
echo "=== ".($een === $drie);
echo "<br/>";

if($een = $twee){
	echo "if".$een;
}

/*
$cijfers = array("een","twee","drie","vier","vijf","zes");
$maxworp = 3;
$worpen = 0;

labeltje:
	$ogen = mt_rand(1,6);
	$totaal += $ogen;
	$worpen ++;
	echo "Worp ".$worpen.": ".$cijfers[$ogen-1]."<br/>";
	if($worpen < $maxworp){
		goto labeltje;
	}
*/

/*
$cijfers = array("een","twee","drie","vier","vijf","zes");
$maxworp = 3;
$worpen = 0;

while(true){
	$ogen = mt_rand(1,6);
	$totaal += $ogen;
	$worpen ++;
	echo "Worp ".$worpen.": ".$cijfers[$ogen-1]."<br/>";
	if($worpen == $maxworp){
		break;
	}
}

echo "Totaalscore: ".$totaal;
*/

/*
$cijfers = array("een","twee","drie","vier","vijf","zes");
$maxworp = 3;

for($worpen =0; $worpen<$maxworp; $worpen ++){
	$ogen = mt_rand(1,6);
	$totaal += $ogen;
	echo "Worp ".$worpen.": ".$cijfers[$ogen-1]."<br/>";
}

echo "Totaalscore: ".$totaal;
*/

/*
$cijfers = array("een","twee","drie","vier","vijf","zes");
$maxworp = 3;
$worpen = 0;

do{
	$ogen = mt_rand(1,6);
	$totaal += $ogen;
	$worpen ++;
	echo "Worp ".$worpen.": ".$cijfers[$ogen-1]."<br/>";
}
while($totaal <20);

echo "Totaalscore: ".$totaal;
*/

/*
$cijfers = array("een","twee","drie","vier","vijf","zes");
$maxworp = 3;
$worpen = 0;

do{
	$ogen = mt_rand(1,6);
	$totaal += $ogen;
	$worpen ++;
	echo "Worp ".$worpen.": ".$cijfers[$ogen-1]."<br/>";
}
while($worpen < $maxworp);

echo "Totaalscore: ".$totaal;
*/

/*
$cijfers = array("een","twee","drie","vier","vijf","zes");
$maxworp = 3;
$worpen = 0;
$bonus = 0;

while($worpen < ($maxworp + $bonus)){
	$ogen = mt_rand(1, 6);
	if($ogen==1 || $ogen==6){
		$bonus++;
	}
	$totaal += $ogen;
	$worpen ++;
	if($worpen <= $maxworp){
		echo"Worp ";
	}
	else{
		echo"bonus";
	}
	echo $worpen.": ".$cijfers[$ogen-1]."<br/>";
}

echo "Totaalscore: ".$totaal;
*/

/*
$cijfers = array("een","twee","drie","vier","vijf","zes");
$maxworp = 3;
$worpen = 0;

while($worpen<$maxworp){
	$ogen = mt_rand(1,6);
	if($ogen==1 || $ogen==6){
		$maxworp ++;
	}
	$totaal += $ogen;
	$worpen ++;
	echo "Worp ".$worpen.": ".$cijfers[$ogen-1]."<br/>";
}

echo "Totaalscore: ".$totaal;
*/

/*
$cijfers = array("een","twee","drie","vier","vijf","zes");
$maxworp = 3;
$worpen = 0;

while($worpen<$maxworp){
	$ogen = mt_rand(1,6);
	$totaal += $ogen;
	$worpen ++;
	echo "Worp ".$worpen.": ".$cijfers[$ogen-1]."<br/>";
}

echo "Totaalscore: ".$totaal;
*/

include('html_staart.inc.php');

?>