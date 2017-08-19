<?php
//$file = 'http://www.w3schools.com/xml/simple.xml';
$file = 'simple.xml';
$content = file_get_contents($file);
$info = simplexml_load_string( "$content", "SimpleXMLElement",
      LIBXML_NOCDATA );

foreach ($info->food as $food => $arr) {
	echo "<h3>Food</h3>";	
	foreach ($arr as $key => $value) {
	echo $key . ": " . $value . "<br>";
}
	
}
?>
