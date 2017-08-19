<?php
include('inlcudes/connect.php');

function jsonConverter($json){
	$query="SELECT data_id, column1, column2, column3, column4 FROM data_visual WHERE data_id='$json'";
	$data = mysql_query($query) or die(mysql_error());
	$array = mysql_fetch_array( $data );
	
	$jsonArray = array($array['data_id']=>array());
	$arrayRow = array(
		'column1'=>(int)$array['column1'],
		'column2'=>(int)$array['column2'],
		'column3'=>(int)$array['column3'],
		'column4'=>(int)$array['column4']
	);
	array_push($jsonArray[$array['data_id']],$arrayRow);
	
	return json_encode($jsonArray);
}
/*
function xmlConverter($xml){
	$query="SELECT data_id, column1, column2, column3, column4 FROM data_visual WHERE data_id='$xml'";
	$data = mysql_query($query) or die(mysql_error());
	$array = mysql_fetch_array( $data );
	
	$xml = new SimpleXMLElement("<?xml version='1.0' encoding='UTF-8'?><movies></movies>");
	$xml->addChild('column1', $array['column1']);
	$xml->addChild('column2', $array['column2']);
	$xml->addChild('column3', $array['column3']);
	$xml->addChild('column4', $array['column4']);
	
	return $xml->asXML();
}
*/

function xmlConverter($xml){
	$query="SELECT data_id, column1, column2, column3, column4 FROM data_visual WHERE data_id='$xml'";
	$data = mysql_query($query) or die(mysql_error());
	$array = mysql_fetch_array( $data );
	
	$sxe = new SimpleXMLElement("<?xml version='1.0' encoding='UTF-8'?><movies></movies>");
	
	$movie = $sxe->addChild('movie');
	$movie->addChild('title', "Grave of the fireflies");
	$movie->addChild('plot', "A tragic film covering a young boy and his little sister's struggle to survive in Japan during World War II.");
	$movie->addChild('genre', 'drama');
	
	$characters = $movie->addChild('characters');
	//$character  = $characters->addChild('character');
	$characters->addChild('director', 'Mr. Parser');
	$characters->addChild('writer', 'John Doe');
	$characters->addChild('writer', 'Isao Takahata');
	
	$rating = $movie->addChild('rating', $array['column1']);
	
	echo $sxe->asXML();
}

/*

$sxe = new SimpleXMLElement($xmlstr);
$sxe->addAttribute('type', 'documentary');

$movie = $sxe->addChild('movie');
$movie->addChild('title', 'PHP2: More Parser Stories');
$movie->addChild('plot', 'This is all about the people who make it work.');

$characters = $movie->addChild('characters');
$character  = $characters->addChild('character');
$character->addChild('name', 'Mr. Parser');
$character->addChild('actor', 'John Doe');

$rating = $movie->addChild('rating', '5');
$rating->addAttribute('type', 'stars');
 
echo $sxe->asXML();


*/

/*
$xmlArray = array(
		'grave_of_the_fireflies' => $array['column1'],
		'Howls_moving_castle' => $array['column2'],
		'Kikis_delivery_service' => $array['column3'],
		'My_neighbor_totoro' => $array['column4'],
	);
	
	$xml = new SimpleXMLElement("<?xml version='1.0' encoding='UTF-8'?><movies></movies>");

*/

$type = $_GET['type'];

if($type == 'json'){
	header('Content-type: text/json');
	header('Content-type: application/json');

	echo jsonConverter('json');
};

if($type == 'xml'){
	header('Content-Type: text/xml'); 
	header('Content-type: application/xml');
	
	echo xmlConverter('xml');
	
};

?>