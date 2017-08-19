<?php

$oefening = 6.3;

include('html_kop.inc.php');

echo "\n<h1>Oefening $oefening</h1>\n";
echo "\n<h2>Getallen</h2>";

$getal = 34;
$andergetal = 54;

echo "Aftrekken: ".($getal-$andergetal +1);
echo "<br/>";
echo "Absoluut: ". abs($getal-$andergetal);
echo "<br/>";
echo "Afgerond: ".round($andergetal/$getal);
echo "<br/>";
echo "Afgekapt: ".floor($andergetal/$getal);
echo "<br/>";
echo "Afgerond (3): ".round($andergetal/$getal, 3);
echo "<br/>";
echo "Willekeurig: ".mt_rand($getal, $andergetal);

include('html_staart.inc.php');

?>