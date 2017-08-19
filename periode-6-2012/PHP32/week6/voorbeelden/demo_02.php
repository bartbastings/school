<?php
//$file = 'http://www.w3schools.com/xml/simple.xml';
$file = 'simple.xml';
$content = file_get_contents($file);
$info = simplexml_load_string( "$content", "SimpleXMLElement",
      LIBXML_NOCDATA );

// dump het gehele simpleXML object: 
echo "<h3>Het hele object</h3>";
print_r($info);

echo "<h3>Het eerste kind van food</h3>";
var_dump($info->food[0]);

echo "<h3>De naam van het tweede kind van food</h3>";
var_dump($info->food[1]->name);

echo "<h3>De description van het derde kind van food</h3>";
echo $info->food[2]->description; 
?>
