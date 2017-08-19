<?php
require_once("phpFlickr.php");

// instantieer een nieuw phpFlickr object
$f = new phpFlickr("143aae576d5b00f12fbd31a89551a872","931b4a4a6d9e38eb");

// haal informatie op van de geauthenticeerde gebruiker
// dit is een wrapper van de volgende Flickr API functie:
// http://www.flickr.com/services/api/flickr.auth.checkToken.html
$token = $f->auth_checkToken();
 
// Find the NSID of the authenticated user
$nsid = $token['user']['nsid'];

//debugging...
/*
	echo "<pre>";
	var_dump($nsid);
	echo "</pre>";
*/

// haal informatie op over een bepaalde gebruiker
// dit is een wrapper van de volgende Flickr API functie:
// http://www.flickr.com/services/api/flickr.people.getInfo.html
$owner = $f->people_getInfo($nsid);

//debugging...
/*
echo "<pre>";
var_dump($owner);
echo "</pre>";
*/
echo "<br> Owner: " . $owner['username'];

echo "<br> Photo URL: " . $owner["photosurl"];



?>