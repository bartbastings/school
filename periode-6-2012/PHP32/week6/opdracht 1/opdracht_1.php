<?php
$oefening = 1;

include('html_kop.inc.php');

echo "\n<h1>Opdracht $oefening</h1>\n";

echo "\n<h3>RSS feed lezen</h3>\n";

$file = 'http://www.nu.nl/feeds/rss/algemeen.rss';
$content = file_get_contents($file);
$info = simplexml_load_string( "$content", "SimpleXMLElement",LIBXML_NOCDATA )or die ("Deze feed is op dit moment helaas niet beschikbaar");;

//print_r($info);

$num = count($info->channel->item);

echo "\n<h3>Nieuwscategorie</h3>\n";

for ($c=0; $c < $num; $c++) {
			foreach($info->channel->item[$c]->category as $nieuwscategorie){
				echo $nieuwscategorie."<br/>";
			}
		}
		
echo "\n<h3>Publicatiedatum</h3>\n";

	for ($c=0; $c < $num; $c++) {
			foreach($info->channel->item[$c]->pubDate as $publicatiedatum){
				$keywords = preg_split("/[\s,]+/",$publicatiedatum);
				//print_r( $keywords );
				if ($keywords[2] == "Dec"){
					$december = 12;
				}
				
				$tijd = preg_split("/[':']+/",$keywords[4]);
				$klok = $tijd[0].':'. $tijd[1].':'.$tijd[2];
				
				$datum = $keywords[1]."-".$december."-".$keywords[3];
				
				echo $datum." ".$klok."<br/>";
				
			}
		}

echo "\n<h3>Titel</h3>\n";

	for ($c=0; $c < $num; $c++) {
			foreach($info->channel->item[$c]->title as $titel){
				echo $titel."<br/>";
			}
		}

		
echo "\n<h3>Omschrijving</h3>\n";
		
	for ($c=0; $c < $num; $c++) {
			foreach($info->channel->item[$c]->description as $omschrijving){
				echo $omschrijving."<br/>";
			}
		}

echo "\n<h3>HTML link</h3>\n";
		
	for ($c=0; $c < $num; $c++) {
			foreach($info->channel->item[$c]->link as $HTML_link){
				echo $HTML_link."<br/>";
			}
		}
		
echo "\n<h3>Alle items</h3>\n";
		
	for ($c=0; $c < $num; $c++) {
			foreach($info->channel->item[$c] as $item){
				echo $item."<br/>";
			}
		}

include('html_staart.inc.php');
?>
