<?php
//$file = 'http://www.w3schools.com/xml/simple.xml';
$file = 'simple.xml';
$content = file_get_contents($file);
$info = simplexml_load_string( "$content", "SimpleXMLElement",
      LIBXML_NOCDATA );

// toon alleen gerechten waar "Waffles" in de Name zitten


//var_dump($info);
echo "<h1>XML gefiltered op content</h1>";

foreach ($info->xpath('food[1][contains(name, "Waffles")]') as $food => $arr) {
	echo "<h3>Waffles</h3>";
		foreach ($arr as $key => $value) {
				echo $key . ": " . $value . "<br>";
		}
}

foreach ($info->xpath('food[calories >= 900]') as $food => $arr) {
	echo "<h3>Heavy stuff</h3>";
		foreach ($arr as $key => $value) {
				echo $key . ": " . $value . "<br>";
		}
}


?>
