<?php

$opdracht = 10;

include('html_kop.inc.php');

echo "\n<h1>Opdracht $opdracht</h1>\n";
echo "\n<h2>opdracht10</h2>";

$tafeltotaal = 100;
$aantal = 0;
$nummer = 0;
$maxnummer =10;

echo 'While loop <br/>';

while($nummer <$maxnummer){
	$aantal +=10;
	$nummer ++;
	echo 'Tafel '.$nummer.' x 10 ='.$aantal.'<br/>';
}

echo'<br/>';
echo 'Do While loop <br/>';

$tafeltotaal = 100;
$aantal = 0;
$nummer = 0;
$maxnummer =10;

do{
	$aantal +=10;
	$nummer ++;
	echo 'Tafel '.$nummer.' x 10 ='.$aantal.'<br/>';
}
while($nummer <$maxnummer);

echo'<br/>';
echo 'For loop <br/>';

$tafeltotaal = 100;
$aantal = 0;
$nummer = 0;
$maxnummer =10;

for($nummer; $nummer <$maxnummer; $nummer ++){
	$aantal +=10;
	echo 'Tafel '.$nummer.' x 10 ='.$aantal.'<br/>';
}

include('html_staart.inc.php');

?>