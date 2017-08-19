<?php

$oefening = 9.1;

include('html_kop.inc.php');

echo "\n<h1>Oefening $oefening</h1>\n";
echo "\n<h2>De straks-functie</h2>";

include('functie.inc.php');

echo 'UNIX-tijd: '.maakstraks(120).'<br/><br/>';
echo 'Datum: '.date('d-m-y H:i:s',time()).'<br/><br/>';

echo 'dag van de maand in twee cijfers (01-31): '.date('d').'<br/>';
echo 'dag van de maand (0-31): '.date('j').'<br/>';
echo 'uren in 24-uursformaat in twee cijfers (00-24): '.date('H').'<br/>';
echo 'uren in de 24-uursformaat (0-24): '.date('G').'<br/>';
echo 'minuten in twee cijfers (00-59): '.date('i').'<br/>';
echo 'nummer van de maand in twee cijfers (00-12): '.date('m').'<br/>';
echo 'nummer van de maand (0-12): '.date('n').'<br/>';
echo 'seconden in twee cijfers (00-59): '.date('s').'<br/>';
echo 'aantal dage in opgegeven maand: '.date('t').'<br/>';
echo 'dag van de week (0-6): '.date('w').'<br/>';
echo 'weeknummer van het jaar (1-52): '.date('W').'<br/>';
echo 'jaar in vier cijfers (2010): '.date('Y').'<br/>';
echo 'dag van het jaar (0-365): '.date('z').'<br/>';

include('html_staart.inc.php');

?>