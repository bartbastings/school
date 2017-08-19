<?php
	header('Content-type: text/javascript');
	// dit script leest de inhoud van een URL en geeft deze direct weer uit.
	// doel: voorkomen van crossdomain requests in je client applicatie
	// subdoel: je kunt dit ook gebruiken om requests te bufferen voor eigen gebruik 
	// Website url to open
	$url = "https://graph.facebook.com/search?q=speedfest&type=post";
	// Get that website's content
	$handle = fopen($url, "r");
	
	// If there is something, read and return
	if ($handle) {
		// zolang het einde van de file niet is bereikt, loop  door de file
	    while (!feof($handle)) {
	    	// fgets: lees de file regel voor regel
	        $buffer = fgets($handle, 4096);
			// echo elke regel
	        echo $buffer;
	    }
	    fclose($handle);
	}

?>