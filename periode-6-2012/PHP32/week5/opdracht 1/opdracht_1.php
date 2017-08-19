<?php
$oefening = 1;

include('html_kop.inc.php');

echo "\n<h1>Opdracht $oefening</h1>\n";

echo "\n<h3>JSON wegschrijven op basis van een bestaande array</h3>\n";

// os array
   $windows7 = array('OS' => "Windows 7", '2010' => "1.6%", '2011' => "3.8%", '2015' => "20.3%");
   $android = array('OS' => "Android", '2010' => "29.6%", '2011' => "38.9%", '2015' => "43.8%");
   $iOS = array('OS' => "iOS",'2010' => "21.3%", '2011' => "18.2%", '2015' => "16.9%");
   
foreach($windows7 as $key => $value){
	echo $key.' : '.$value.'<br/>';
}

echo "<br/>";

foreach($android as $key => $value){
	echo $key.' : '.$value.'<br/>';
}

$windows7 = array("os"=> $windows7);

$android = array("os"=> $android);

$iOS = array ("os"=> $iOS);

echo "<br/><br/>";

echo json_encode($windows7)."<br/><br/>";

echo json_encode($android)."<br/><br/>";

echo json_encode($iOS)."<br/><br/>";

include('html_staart.inc.php');
?>
