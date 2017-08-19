<?php
// connect to database \\
include('../inlcudes/connect.php');
// secure input \\
include('../inlcudes/secureInput.php');
// password encryption \\
include('../inlcudes/salt.php');
// validate functions \\
include('../inlcudes/validate.php');
// database querys \\
include('../inlcudes/query.php');

session_start();

$xmlQuery="SELECT * FROM movies";
$xmlResult = mysql_query($xmlQuery) or die ('error: '.mysql_error());
$xml = new SimpleXMLElement("<?xml version='1.0' encoding='UTF-8'?><xml></xml>");
$movies = $xml->addChild('movies');

while($xmlRow = mysql_fetch_array($xmlResult)) {
	
	$movie = $movies->addChild('movie');
	$movie->addChild('title', $xmlRow['title']);
	
	$movie->addChild('rating', $xmlRow['rating']);
	$movie->addChild('plot', $xmlRow['plot']);	
	
	$specs = $movie->addChild('specs');
	$specs->addChild('runtime', $xmlRow['runtime']);
	$specs->addChild('sound_mix', $xmlRow['sound_mix']);
	$specs->addChild('aspect_ratio', $xmlRow['aspect_ratio']);
	
	$details = $movie->addChild('details');
	$details->addChild('country', $xmlRow['country']);
	$details->addChild('language', $xmlRow['language']);
	$details->addChild('genre', $xmlRow['genre']);
	$details->addChild('release_date', $xmlRow['release_date']);
}

header("Content-Type: application/xml; charset=utf-8");	
echo $xml->asXML();

?>