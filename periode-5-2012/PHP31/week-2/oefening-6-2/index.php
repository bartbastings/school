<?php

$oefening = 6.2;

include('html_kop.inc.php');

echo "\n<h1>Oefening $oefening</h1>\n";
echo "\n<h2>String-funcites</h2>";

$regel ="hallo Wereld";
echo substr($regel,0,5)."<br/>";
echo substr($regel,6)."<br/>";
echo substr($regel,-6)."<br/>";
echo substr($regel,-6,4)."<br/><br/>";
echo wordwrap($regel,5,"<br/>")."<br/>";
echo wordwrap($regel,5,"<br/>", true);

include('html_staart.inc.php');

?>