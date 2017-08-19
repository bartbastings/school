<?php

$opdracht = 9;

include('html_kop.inc.php');

echo "\n<h1>Opdracht $opdracht</h1>\n";
echo "\n<h2>opdracht9</h2>";

$maanden = mt_rand(1, 12);
echo 'Maand: ';
switch($maanden){
	case 1:
		echo 'Januari';
		break;
	case 2:
		echo 'Februari';
		break;
	case 3:
		echo 'Maart';
		break;
	case 4:
		echo 'April';
		break;
	case 5:
		echo 'Mei';
		break;
	case 6:
		echo 'Juni';
		break;
	case 7:
		echo 'Juli';
		break;
	case 8:
		echo 'Augustus';
		break;
	case 9:
		echo 'September';
		break;
	case 10:
		echo 'Oktober';
		break;
	case 11:
		echo 'November';
		break;
	case 12:
		echo 'December';
		break;
	default:
		echo 'Onmogelijk';
	
}

include('html_staart.inc.php');

?>