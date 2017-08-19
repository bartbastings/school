<?php
//$file = 'http://www.w3schools.com/xml/simple.xml';
$file = 'simple.xml';
$content = file_get_contents($file);
$info = simplexml_load_string( "$content", "SimpleXMLElement",
      LIBXML_NOCDATA );

// toon alleen gerechten waar "Waffles" in de Name zitten


//var_dump($info);


foreach ($info->xpath('food[calories < 900]') as $food => $arr) {
	$arr->addAttribute('type', 'light');	
}

foreach ($info->xpath('food[calories >= 900]') as $food => $arr) {
	$arr->addAttribute('type', 'heavy');	
}

header("Content-type: text/xml");
echo $info->asXML();


?>
