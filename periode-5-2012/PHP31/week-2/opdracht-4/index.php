<?php
$opdracht = 4;

include('html_kop.inc.php');

echo "\n<h1>Opdracht $opdracht</h1>\n";

echo "\n<h2>opdracht4</h2>";

/*
$Mike=20;
$Dennis=21;
$Rudi="23";
$Dave=20;

a) Van welk datatypes zijn deze variabelen?

b) Wat is het resultaat van de volgende vergelijkingsoperatoren? Leg ook uit waarom.

a. $Mike == $Dennis;
b. $Mike<$Dennis;
c. $Mike<$Rudi;
d. $Rudi===$Dennis;

c) Wat is het resultaat van de volgende expressies? Leg ook uit waarom

a. $Dennis+$Mike;
b. $Dennis.$Mike;
c. $Rudi.$Dennis;
d. $Rudi=$Dave;

d) Wat is het resultaat van de volgende booleaanse operatoren? Leg uit waarom.

a. $Mike===$Dave&&$Mike<$Dennis;
b. $Dennis>$Dave||$Mike<=$Dave;
c. $Dennis<=$Rudi||$Dave;
d. $Dave>=$Mike&&$Dave<=$Mike;
*/

$Mike=20;
$Dennis=21;
$Rudi="23";
$Dave=20;

echo "\n<h2>Van welk datatypes zijn deze variabelen?</h2>";
echo 'Mike ='.$Mike.' is een int<br/>';
echo 'Dennis ='.$Dennis.' is een int<br/>';
echo 'Rudi ='.$Rudi.' is een string<br/>';
echo 'Dave ='.$Dave.' is een int<br/>';

echo "\n<h2>Wat is het resultaat van de volgende vergelijkingsoperatoren?</h2>";
echo 'a. Mike == Dennis = '.($Mike==$Dennis).'<br/>';
echo 'b. Mike < Dennis = '.($Mike<$Dennis).'<br/>';
echo 'c. Mike < Rudi = '.($Mike<$Rudi).'<br/>';
echo 'd. Rudi === Dave = '.($Rudi===$Dennis).'<br/>';

echo "\n<h2>Wat is het resultaat van de volgende expressies?</h2>";
echo 'a. Dennis + Mike = '.($Dennis+$Mike).'<br/>';
echo 'b. Dennis.Mike = '.$Dennis.$Mike.'<br/>';
echo 'c. Rudi.Dennis = '.$Rudi.$Dennis.'<br/>';
echo 'd. Rudi = Dave = '.($Rudi=$Dave).'<br/>';

echo "\n<h2>Wat is het resultaat van de volgende booleaanse operatoren?</h2>";
echo 'a. Mike === Dave && Mike < Dennis = '.($Mike===$Dave&&$Mike<$Dennis).'<br/>';
echo 'b. Dennis > Dave || Mike <= Dave = '.($Dennis>$Dave||$Mike<=$Dave).'<br/>';
echo 'c. Dennis <= Rudi || Dave = '.($Dennis<=$Rudi||$Dave).'<br/>';
echo 'd. Dave >= Mike && Dave <= Mike = '.($Dave>=$Mike&&$Dave<=$Mike).'<br/>';


include('html_staart.inc.php');

?>
