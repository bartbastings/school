<?php
include('inlcudes/htmlHead.php');
include('inlcudes/connect.php');

session_start();

// rss feed variables
$RSSFeedSelect = $_POST['RSSFeedOption'];
$urlGames = 'http://www.nu.nl/deeplink_rss2/index.jsp?r=Games';
$urlInternet = "http://www.nu.nl/deeplink_rss2/index.jsp?r=Internet";
$urlEconomie = "http://www.nu.nl/deeplink_rss2/index.jsp?r=Economie";
$urlOpmerkelijk = 'http://www.nu.nl/deeplink_rss2/index.jsp?r=Opmerkelijk';
$urlWetenschap = 'http://www.nu.nl/deeplink_rss2/index.jsp?r=Wetenschap';
$url = $urlGames;

// rss feed function
function RSSFeed($url){
	$xml = simplexml_load_file($url) or die($errorRssfeed ='<p>Problems with loading RSS feed</p>');
	$headTitle = $xml->channel->title;
	$items = $xml->channel->item;
	$html = '<h2>'.$headTitle.'</h2>';
	$html .= '<ul>';
	foreach($items as $item){
		$title = $item->title;
		$link = $item->link;		
		$description = $item->description;
		$html .='<li>';
		$html .= '<h3><a href='.$link.'>'.$title.'</a></h3>';
		$html .= '<p>'.$description.'</p>';
		$html .= '</li>';
	};
	$html .= '</ul>';
	
	echo $html;
}

//twitterfeed variavbles
if (empty($keyword)) {
	$keyword = 'bart';
}


// twitterfeed
function twitterfeed($twitterKeyword){
	$twitterUrl = 'http://localhost:8888/PHP32_herkansing/eindopdracht/twitter/index.php?type=json&keyword='.$twitterKeyword.'';
	$twitterJson = file_get_contents($twitterUrl);
	$twitterOutput = json_decode($twitterJson);
	$tweets = $twitterOutput->tweet;
	
	$html = '<h2>Zoekwoord: '.$twitterKeyword.'</h2>';
	$html .= '<ul>';
	foreach($tweets as $tweet){
		$html .= '<li><h3>';
		$html .= $tweet->username.'</h3>: '.$tweet->text;
		$html .= '</li>';
	};
	$html .= '</ul>';
	
	echo $html;
}

// xml
$xmlUrl = 'http://localhost:8888/PHP32_herkansing/eindopdracht/datavisualization.php?type=xml';
$xmlData = simplexml_load_file($xmlUrl) or die($errorRssfeed ='<p>Problems with loading XML file</p>');

$xmlColumn1 = $xmlData->column1*10;
$xmlColumn2 = $xmlData->column2*10;
$xmlColumn3 = $xmlData->column3*10;
$xmlColumn4 = $xmlData->column4*10;

//json
$jsonUrl = 'http://localhost:8888/PHP32_herkansing/eindopdracht/datavisualization.php?type=json';
$json = file_get_contents($jsonUrl);
$obj = json_decode($json);
$jsonArray = $obj->json;

$jsonColumn1 = $jsonArray[0]->column1*10;
$jsonColumn2 = $jsonArray[0]->column2*10;
$jsonColumn3 = $jsonArray[0]->column3*10;
$jsonColumn4 = $jsonArray[0]->column4*10;

// text functions
$filenameText = "text/text.txt";
$text = "<p>";
if (file_exists($filenameText)){
	$openTextfileRead = fopen($filenameText,"r")or die ($errorText = "<p>can't open file</p>");
	//$readTextdoc = fread($openTextfileRead, filesize($filename));
	while(! feof($openTextfileRead)){
		$readTextdoc = fgets($openTextfileRead)."<br/>";
		$text .= $readTextdoc;
	}
	$text .= "</p>";
	fclose($openTextfileRead);
}
else{
	$errorText = "<p>text file doesn't exist</p>";	
}

// csv functions
$filenameCsv = "text/text.csv";
if (file_exists($filenameCsv)){
	$openCsvfileRead = fopen($filenameCsv,"r")or die ($errorCsv = "<p>can't open file</p>");
	$csv = "<p class='csv'>";
	while(! feof($openCsvfileRead)){
		$readCsvdoc = fgetcsv($openCsvfileRead);
		foreach( $readCsvdoc as $key => $value){
			$csv .= $value."</br>";
		}
	}
	$csv .= "</p>";
	fclose($openCsvfileRead);
}
else{
	$errorCsv = "<p>csv file doesn't exist</p>";	
}


// submit functions
if (isset($_POST['rssfeedSubmit'])){
	
	switch ($RSSFeedSelect) {
		case 'Games':
			$url = $urlGames;
        	break;
		case 'Internet':
			$url = $urlInternet;
			break;
		case 'Economie':
			$url = $urlEconomie;
			break;
		case 'Opmerkelijk':
			$url = $urlOpmerkelijk;
			break;
		case 'Wetenschap':
			$url = $urlWetenschap;
			break;
	}
}
elseif (isset($_POST['twitterfeedSubmit'])){
	if (!empty($_POST['twitterfeedTextfield'])){
		$keyword = $_POST['twitterfeedTextfield'];
	}
	else{
		$errorTwitterfeed = "<p style='color:red;'>inputfield is empty</p>";
	}
}
elseif (isset($_POST['textSubmit'])){
	if (!empty($_POST['textTextfield'])){
		$openTextfileAppend = fopen($filenameText,"a")or die ($errorText = "<p style='color:red;'>can't open file</p>");
		$stringDataText = $_POST['textTextfield']."\n";
		fwrite($openTextfileAppend, $stringDataText);
		fclose($openTextfileAppend);
	}
	else{
		$errorText = "<p style='color:red;'>inputfield is empty</p>";
	}
}
elseif (isset($_POST['csvSubmit'])){
	if (!empty($_POST['csvTextfield'])){
		$openCsvfileAppend = fopen($filenameCsv,"a")or die ($errorText = "<p style='color:red;'>can't open file</p>");
		$stringDataCsv = $_POST['csvTextfield']."\n";
		fwrite($openCsvfileAppend,$stringDataCsv);
		fclose($openCsvfileAppend);
	}
	else{
		$errorCsv = "<p style='color:red;'>inputfield is empty</p>";
	}
}
?>
<h1>Weclome</h1>
<div class="rssfeed">
<h2>RSS feed</h2>
<?php echo $errorRssfeed; ?>
<form method="post" action="welcome.php">
  <select name="RSSFeedOption">
    <option value="Games">Games</option>
    <option value="Internet">Internet</option>
    <option value="Economie">Economie</option>
    <option value="Opmerkelijk">Opmerkelijk</option>
    <option value="Wetenschap">Wetenschap</option>
  </select>
  <input type="submit"value='submit' name='rssfeedSubmit'>
</form>
<div class="rssfeedOutput">
<?php 
RSSFeed($url); 
?>
</div>
</div>

<div class="twitterfeed">
<h2>Twitter feed</h2>
<?php echo $errorTwitterfeed; ?>
<form method="post" action="welcome.php">
  <input type="text" name="twitterfeedTextfield" placeholder="insert search word">
  <input type="submit"value='submit' name='twitterfeedSubmit'>
</form>
<div class="twitterOutput">
<?php twitterfeed($keyword); ?>
</div>
</div>

<div class="textwrite">
<h2>Read and write text file</h2>
<?php echo $errorText; ?>
<form method="post" action="welcome.php">
  <input type="text" name="textTextfield" placeholder="insert search word">
  <input type="submit"value='submit' name='textSubmit'>
</form>
<div class="textwriteOutput">
<?php echo $text ?>
</div>
</div>

<div class="csvwrite">
<h2>Read and write csv file</h2>
<?php echo $errorCsv; ?>
<form method="post" action="welcome.php">
  <input type="text" name="csvTextfield" placeholder="insert search word">
  <input type="submit"value='submit' name='csvSubmit'>
</form>
<?php echo $csv ?>
</div>

<div class="xmlData">
<h2>XML datavisulisatie</h2>
<canvas id="canvasXml" height="300" width="300">Your browser does not support the HTML5 canvas tag.</canvas>
</div>

<script>

var xmlColumn1 = '<?php echo $xmlColumn1 ;?>';
var xmlColumn2 = '<?php echo $xmlColumn2 ;?>';
var xmlColumn3 = '<?php echo $xmlColumn3 ;?>';
var xmlColumn4 = '<?php echo $xmlColumn4 ;?>';

var canvasXml = document.getElementById("canvasXml");
var contextXml = canvasXml.getContext("2d");

contextXml.fillStyle="navy";
contextXml.fillRect(0,10,xmlColumn1,50);
contextXml.fillStyle="navy";
contextXml.fillRect(0,85,xmlColumn2,50);
contextXml.fillStyle="navy";
contextXml.fillRect(0,160,xmlColumn3,50);
contextXml.fillStyle="navy";
contextXml.fillRect(0,235,xmlColumn4,50);

</script>

<div class="jsonData">
<h2>Json datavisulisatie</h2>
<canvas id="canvasJson" height="300" width="300">Your browser does not support the HTML5 canvas tag.</canvas>
</div>

<script>

var jsonColumn1 = '<?php echo $jsonColumn1 ;?>';
var jsonColumn2 = '<?php echo $jsonColumn2 ;?>';
var jsonColumn3 = '<?php echo $jsonColumn3 ;?>';
var jsonColumn4 = '<?php echo $jsonColumn4 ;?>';

var canvasJson = document.getElementById("canvasJson");
var contextJson = canvasJson.getContext("2d");

contextJson.fillStyle="navy";
contextJson.fillRect(0,10,jsonColumn1,50);
contextJson.fillStyle="navy";
contextJson.fillRect(0,85,jsonColumn2,50);
contextJson.fillStyle="navy";
contextJson.fillRect(0,160,jsonColumn3,50);
contextJson.fillStyle="navy";
contextJson.fillRect(0,235,jsonColumn4,50);

</script>

<?php
include('inlcudes/htmlTail.php');
?>