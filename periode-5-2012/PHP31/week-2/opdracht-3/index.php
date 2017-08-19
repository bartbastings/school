<?php

$opdracht = 3;

include('html_kop.inc.php');

echo "\n<h1>Opdracht $opdracht</h1>\n";
echo "\n<h2>opdracht3</h2>";

$a = 'Goede morgen!';
$b = 42;
$c = 187.12;
$d = 0;
$e = -0.154;
$f = true;

echo 'a) '.$a.'<br/>';
echo 'b) '.(int)$b.'<br/>';
echo 'c) '.(float) $c.'<br/>';
echo 'd) '.(int)$d.'<br/>';
echo 'e) '.(float)$e.'<br/>';
echo 'f) '.$f;

include('html_staart.inc.php');

?>