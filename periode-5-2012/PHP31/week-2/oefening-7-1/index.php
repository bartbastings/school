<?php
$oefening = 7.1;

include('html_kop.inc.php');

echo "\n<h1>Oefening $oefening</h1>\n";
echo "\n<h2>if</h2>";

$cijfers = array("een","twee","drie","vier","vijf","zes");
$ogen = mt_rand(1,6);
echo $cijfers[5];

/*
$ogen=mt_rand(1,6);
echo "Aantal ogen: ";
switch($ogen){
	case 1:
		echo"een";
		break;
	case 2:
		echo"twee";
		break;
	case 3:
		echo"drie";
		break;
	case 4:
		echo"vier";
		break;
	case 5:
		echo"vijf";
		break;
	case 6:
		echo"zes";
		break;
	default:
		echo "Onmogelijk";
}
*/

/*
$ogen=mt_rand(1,6);
echo "Aantal ogen: ";
if($ogen == 1){
	echo "een";
}
elseif($ogen == 2){
	echo "twee";
}
elseif($ogen == 3){
	echo "drie";
}
elseif($ogen == 4){
	echo "vier";
}
elseif($ogen == 5){
	echo "vijf";
}
elseif($ogen == 6){
	echo "zes";
}
else
*/

/*
$ogen=mt_rand(1,6);
echo "Aantal ogen: ".$ogen;
if($ogen==1 || $ogen==6){
	 echo"<br/>Nog een keer!";
}
else
echo"<br/>Pech";
*/

/*
$ogen=mt_rand(1,6);
echo "Aantal ogen: ".$ogen;
if($ogen==1 || $ogen==6) echo"<br/>Nog een keer!";
*/

include('html_staart.inc.php');

?>