<?php
$ch = curl_init();
$url = 'http://kinderopvangbanholt.nl/twitter-api-php-master/index.php?type=json';		
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, 0);		
$json = curl_exec($ch); 
curl_close($ch);
$json = json_decode($json, true);
?>