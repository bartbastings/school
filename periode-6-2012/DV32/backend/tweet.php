<?php

$oefening = "tweet";

include('html_kop.inc.php');

echo "\n<h1>Opdracht $oefening</h1>\n";
//echo "\n<h3>Tweet</h3>\n";

header('Content-type: text/javascript');
$url = "http://search.twitter.com/search.json?q=hoer&rpp=5&lang=nl";
$handle = fopen($url, "r");

if ($handle) {
	while (!feof($handle)) {
	
		$buffer = fgets($handle, 4096);
		
		$number = preg_split('#,#', "$buffer");
		$datum = $number[8];
		$uur = preg_split('#\s#', "$datum");
		$tijd = $uur[4];
		
		$timer = date('H')-2 .date(':i:s');
		
		if($timer > $tijd){
			
			if (preg_match('#text":".*"#', $buffer, $match)) {
				$word = preg_split('#"."#', "$match[0]");
				$text = $word[1];
				//echo $text."<br/><br/>";
			}
		}
	}
	fclose($handle);
}

echo "\n<h3>Hoer</h3>\n";
$hoer = "http://search.twitter.com/search.json?q=hoer&rpp=500&lang=nl";
$handle = fopen($hoer, "r");

if ($handle) {
	while (!feof($handle)) {
		
		$buffer = fgets($handle, 4096);
		
		$bericht = preg_split('#{"created_at".#', "$buffer");
		
		foreach ($bericht as $key => $value) {
			
			$number = preg_split('#,#', "$buffer");
			$datum = $number[8];
			$uur = preg_split('#\s#', "$datum");
			$tijd = $uur[4];
			
			if($timer > $tijd){
				
				$counthoer = $counthoer+1;
				
				if (preg_match('#text":".*"#', $value, $match)) {
					$word = preg_split('#"."#', "$match[0]");
					$text = $word[1];
					//echo $text."<br/><br/>";
				}
			}
		}
	}
	fclose($handle);
}

echo $counthoer;

echo "\n<h3>Klootzak</h3>\n";
$klootzak = "http://search.twitter.com/search.json?q=klootzak&rpp=500&lang=nl";
$handle = fopen($klootzak, "r");
	
if ($handle) {
	
	while (!feof($handle)) {
		
		$buffer = fgets($handle, 4096);
		
		$bericht = preg_split('#{"created_at".#', "$buffer");
		
		foreach ($bericht as $key => $value) {
			
			$number = preg_split('#,#', "$buffer");
			$datum = $number[8];
			$uur = preg_split('#\s#', "$datum");
			$tijd = $uur[4];
			
			if($timer > $tijd){
				
				$countklootzak = $countklootzak+1;
				
				if (preg_match('#text":".*"#', $value, $match)) {
					$word = preg_split('#"."#', "$match[0]");
					$text = $word[1];
					//echo $text."<br/><br/>";
				}
			}
		}
	}
	fclose($handle);
}

echo $countklootzak;

echo "\n<h3>Tering</h3>\n";
$tering = "http://search.twitter.com/search.json?q=tering&rpp=500&lang=nl";
$handle = fopen($tering, "r");

if ($handle) {
	while (!feof($handle)) {
		
		$buffer = fgets($handle, 4096);
		
		$bericht = preg_split('#{"created_at".#', "$buffer");
		
		foreach ($bericht as $key => $value) {
			
			$number = preg_split('#,#', "$buffer");
			$datum = $number[8];
			$uur = preg_split('#\s#', "$datum");
			$tijd = $uur[4];
			
			if($timer > $tijd){
				
				$counttering = $counttering+1;
				if (preg_match('#text":".*"#', $value, $match)) {
					$word = preg_split('#"."#', "$match[0]");
					$text = $word[1];
					//echo $text."<br/><br/>";
				}
			}
		}
	}
	fclose($handle);
}

echo $counttering;

echo "\n<h3>Kanker</h3>\n";
$kanker = "http://search.twitter.com/search.json?q=kanker&rpp=500&lang=nl";
$handle = fopen($kanker, "r");

if ($handle) {
	while (!feof($handle)) {
		
		$buffer = fgets($handle, 4096);
		
		$bericht = preg_split('#{"created_at".#', "$buffer");
		
		foreach ($bericht as $key => $value) {
			
			$number = preg_split('#,#', "$buffer");
			$datum = $number[8];
			$uur = preg_split('#\s#', "$datum");
			$tijd = $uur[4];
			
			if($timer > $tijd){
				
				$countkanker = $countkanker+1;
				
				if (preg_match('#text":".*"#', $value, $match)) {
					$word = preg_split('#"."#', "$match[0]");
					$text = $word[1];
					//echo $text."<br/><br/>";
				}
			}
		}
	}
	fclose($handle);
}

echo $countkanker;

echo "\n<h3>gvd</h3>\n";
$gvd = "http://search.twitter.com/search.json?q=godverdomme&rpp=500&lang=nl";
$handle = fopen($gvd, "r");
	
if ($handle) {
	while (!feof($handle)) {
		
		$buffer = fgets($handle, 4096);
		
		$bericht = preg_split('#{"created_at".#', "$buffer");
		
		foreach ($bericht as $key => $value) {
			
			$number = preg_split('#,#', "$buffer");
			$datum = $number[8];
			$uur = preg_split('#\s#', "$datum");
			$tijd = $uur[4];
			
			if($timer > $tijd){
				
				$countgvd = $countgvd+1;
				
				if (preg_match('#text":".*"#', $value, $match)) {
					$word = preg_split('#"."#', "$match[0]");
					$text = $word[1];
					//echo $text."<br/><br/>";
				}
			}
		}
	}
	fclose($handle);
}

echo $countgvd;

echo "\n<h3>Kut</h3>\n";
$kut = "http://search.twitter.com/search.json?q=kut&rpp=500&lang=nl";
$handle = fopen($kut, "r");

if ($handle) {
	while (!feof($handle)) {
		
		$buffer = fgets($handle, 4096);
		
		$bericht = preg_split('#{"created_at".#', "$buffer");
		
		foreach ($bericht as $key => $value) {
			
			$number = preg_split('#,#', "$buffer");
			$datum = $number[8];
			$uur = preg_split('#\s#', "$datum");
			$tijd = $uur[4];
			
			if($timer > $tijd){
				
				$count = $count+1;
				
				if (preg_match('#text":".*"#', $value, $match)) {
					$word = preg_split('#"."#', "$match[0]");
					$text = $word[1];
					//echo $text."<br/><br/>";
				}
			}
		}
	}
	fclose($handle);
}

echo $count;

echo "\n<h3>Bitch</h3>\n";
$bitch = "http://search.twitter.com/search.json?q=bitch&rpp=500&lang=nl";
$handle = fopen($bitch, "r");

if ($handle) {
	while (!feof($handle)) {
		
		$buffer = fgets($handle, 4096);
		
		$bericht = preg_split('#{"created_at".#', "$buffer");
		
		foreach ($bericht as $key => $value) {
			
			$number = preg_split('#,#', "$buffer");
			$datum = $number[8];
			$uur = preg_split('#\s#', "$datum");
			$tijd = $uur[4];
			
			if($timer > $tijd){
				
				$countbitch = $countbitch+1;
				
				if (preg_match('#text":".*"#', $value, $match)) {
					$word = preg_split('#"."#', "$match[0]");
					$text = $word[1];
					//echo $text."<br/><br/>";
				}
			}
		}
	}
	fclose($handle);
}

echo $countbitch;

echo "\n<h3>Mongool</h3>\n";
$mongool = "http://search.twitter.com/search.json?q=mongool&rpp=500&lang=nl";
$handle = fopen($mongool, "r");

if ($handle) {
	while (!feof($handle)) {
		
		$buffer = fgets($handle, 4096);
		
		$bericht = preg_split('#{"created_at".#', "$buffer");
		
		foreach ($bericht as $key => $value) {
			
			$number = preg_split('#,#', "$buffer");
			$datum = $number[8];
			$uur = preg_split('#\s#', "$datum");
			$tijd = $uur[4];
			
			if($timer > $tijd){
				
				$countmongool = $countmongool+1;
				
				if (preg_match('#text":".*"#', $value, $match)) {
					$word = preg_split('#"."#', "$match[0]");
					$text = $word[1];
					//echo $text."<br/><br/>";
				}
			}
		}
	}
	fclose($handle);
}

echo $countmongool;

include('html_staart.inc.php');

?>