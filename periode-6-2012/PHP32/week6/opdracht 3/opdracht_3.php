<?php
$oefening = 3;

include('html_kop.inc.php');

echo "\n<h1>Opdracht $oefening</h1>\n";

echo "\n<h3>XML schrijven</h3>\n";

$file = 'http://www.wijnwinkel.nl/rss/catalog/category/cid/38/store_id/6/';
$content = file_get_contents($file);
$info = simplexml_load_string( "$content", "SimpleXMLElement",LIBXML_NOCDATA )or die ("Deze feed is op dit moment helaas niet beschikbaar");

//mevr. ik begrijp niet goed waar ik het in moet zetten, in de database maar moet ik zelf een nieuwe tabel aanmaken? Ik heb de 4 velden met data uit de rss, maar ik kom nu niet verder.

$num = count($info->channel->item);

echo "\n<h3>Link</h3>\n";

for ($c=0; $c < $num; $c++) {
			foreach($info->channel->item[$c]->link as $soort){
				echo $soort."<br/>";
			}
		}

echo "\n<h3>Naam</h3>\n";

for ($c=0; $c < $num; $c++) {
			foreach($info->channel->item[$c]->title as $naam){
				echo $naam."<br/>";
			}
		}

echo "\n<h3>Kosten</h3>\n";
		
for ($c=0; $c < $num; $c++) {
			foreach($info->channel->item[$c]->description as $omschrijving){
				
				$keywords = preg_split("/[\s,]+/", $omschrijving);
				
				$m = preg_match_all('#[0-9]{2}#', $keywords[13], $match); 
				
				if ($m) { 
				for ($j=0;$j<$m;$j++) { 
				echo "€ ".$match[0][$j].",".$keywords[14]."<br />";
			}
		}
	}
}

echo "\n<h3>Datumin</h3>\n";

for ($c=0; $c < $num; $c++) {
			foreach($info->channel->item[$c]->pubDate as $datumin){
				echo $datumin."<br/>";
			}
		}



include('html_staart.inc.php');
?>
