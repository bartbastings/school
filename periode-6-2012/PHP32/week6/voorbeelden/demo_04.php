<?php
//$file = 'http://www.w3schools.com/xml/simple.xml';
$file = 'simple.xml';
$content = file_get_contents($file);
$info = simplexml_load_string( "$content", "SimpleXMLElement",
      LIBXML_NOCDATA );

echo "Naam van het element: " . $info->getName();
echo "<p>";
echo "Aantal children van het element: " . $info->count();
 
?>
