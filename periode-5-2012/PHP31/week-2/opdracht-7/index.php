<?php

$opdracht = 7;

include('html_kop.inc.php');

echo "\n<h1>Opdracht $opdracht</h1>\n";
echo "\n<h2>opdracht7</h2>";

$maanden = array(1=> 'Januari', 'Februari', 'Maart', 'April', 'Mei', 'Juni', 'Juli', 'Augustus', 'September','Oktober', 'November', 'December');

echo "\n<h2>Toon de zomermaanden van het jaar door de juiste index op te geven</h2>";
echo $maanden[6].' - '.$maanden[7].' - '.$maanden[8].'<br/>';

echo "\n<h2>Itereer met foreach door de array en toon alle maanden in de browser</h2>";
foreach($maanden as $key => $value){
	echo 'Maand: '.$key.' - '.$value.'<br/>';
}

echo "\n<h2>Sorteer de array op alfabetische volgorde en toon de eerste 4 maanden</h2>";

asort($maanden);
foreach($maanden as $value){
	echo 'Maand: '.$value.'<br/>';
}

echo "\n<h2>Maak een nieuwe associatieve array van alle maanden van het jaar, gebruik de letter A t/m L als index. Toon de index en de bijbehorende waarden in je browser.</h2>";

$maanden2 = array(a=> 'Januari',b=> 'Februari',c=> 'Maart',d=> 'April',e=> 'Mei',f=> 'Juni',g=> 'Juli',h=> 'Augustus',i=> 'September',j=>'Oktober',k=> 'November',l=> 'December');

foreach($maanden2 as $key => $value){
	echo 'Maand: '.$key.' - '.$value.'<br/>';
}

echo "\n<h2> Toon alle waarden van de array $_SERVER in de browser.</h2>";

$array = $_SERVER['argv'];
$browser = $_SERVER['HTTP_USER_AGENT'];

echo "Array = " . $array . "<br/>";
echo "Browser = " . $browser . "<br/>";

include('html_staart.inc.php');

?>