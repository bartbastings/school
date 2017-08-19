<?php

$opdracht = 11;

include('html_kop.inc.php');

echo "\n<h1>Opdracht $opdracht</h1>\n";
echo "\n<h2>Exit</h2>";

$welkom = $_GET['Welkom'];

echo '<p>klik <a href="opdracht11.php">$welkom</a> voor URL';

include('html_staart.inc.php');

?>