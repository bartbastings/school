<?php
//$file = 'http://www.w3schools.com/xml/simple.xml';
$file = 'simple.xml';
$content = file_get_contents($file);
$info = simplexml_load_string( "$content", "SimpleXMLElement",
      LIBXML_NOCDATA );


echo "<h3>Via object iteratie</h3>";
foreach ($info->children() as $food => $obj) {
	echo "<h3>" . $obj->getName() . "</h3>";
	//var_dump($obj);
	echo "Description: " . $obj->description;	
	}


//var_dump($info);
//print_r($info->xpath('food/description'));
echo "<h3>Via Xpath</h3>";
foreach ($info->xpath('food/description') as $key => $value) {
	echo "<h3>" . $key . "</h3>";
	echo "Description: " . $value . "<br>";	
}



?>
