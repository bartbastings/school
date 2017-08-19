<?php
// connect to database \\
include('inlcudes/connect.php');
// secure input \\
include('inlcudes/secureInput.php');
// password encryption \\
include('inlcudes/salt.php');
// validate functions \\
include('inlcudes/validate.php');
// database querys \\
include('inlcudes/query.php');

session_start();

$xmlMovieRating = 'http://localhost:8888/PHP32_herkansing/final/database/xml.php';
$rssFeedUrl = 'http://www.animenewsnetwork.com/news/rss.xml';
$filenameText = "text/text.txt";
$filennameCSV = "text/text.csv";

// logout button
if (!empty($_POST['logoutSubmit'])) {
	session_destroy();
	header("Location: index.php");
};

// place reaction submit button
if (!empty($_POST['csvSubmit'])){
	if (!empty($_POST['csvTextfield'])){
		$openCsvfileAppend = fopen($filennameCSV,"a")or die ($errorCsv = "<p class='error'>can't open file</p>");
		$stringDataCsv = $_SESSION['firstName'].' '.$_SESSION['surName'].','.$_POST['csvTextfield']."\n";
		fwrite($openCsvfileAppend,$stringDataCsv);
		fclose($openCsvfileAppend);
	}
	else{
		$errorCsv = "<p class='error'>inputfield is empty</p>";
	}
}

function loginCheck(){
	if(empty($_SESSION['userId'])){
		$html = '<a class="button headerButton" href="login.php">Login</a> <a class="button headerButton" href="register.php">Gibil account aanmaken</a>';
		echo $html;
	}
	else{
		$html = '<p>Welcome '.$_SESSION['firstName'].' '.$_SESSION['surName'].'</p>';
		$html .= '<form method="post"><input type="submit" class="button headerButton" name="logoutSubmit" value="Logout"/></form>';
		echo $html;
	}
};

function reachtcheck(){
	if(empty($_SESSION['userId'])){
		$html = '<p>You must be logged in to comment</p>';
		echo $html;
	}
	else{
		$html = '<form method="post"><input type="text" name="csvTextfield" placeholder="insert search word"><input type="submit" value="submit" name="csvSubmit"></form>';
		echo $html;
	}
};

// rss feed function
function RSSFeed($url){
	$xml = simplexml_load_file($url) or die($errorRssfeed ='<p>Problems with loading RSS feed</p>');
	$headTitle = $xml->channel->title;
	$html = '<h2>'.$headTitle.'</h2>';
	$html .= '<ul>';
	
	for($i=0; $i<10; $i++){
		$title = $xml->channel->item[$i]->title;
		$link = $xml->channel->item[$i]->link;
		$description = $xml->channel->item[$i]->description;
		$html .='<li>';
		$html .= '<h3><a href='.$link.'>'.$title.'</a></h3>';
		$html .= '<p>'.$description.'</p>';
		$html .= '</li>';
	};
	$html .= '</ul>';
	echo $html;
}

// twitterfeed
function twitterfeed($twitterKeyword){
	$twitterUrl = 'http://localhost:8888/PHP32_herkansing/final/twitter/index.php?type=json&keyword='.$twitterKeyword.'';
	$twitterJson = file_get_contents($twitterUrl);
	$twitterOutput = json_decode($twitterJson);
	$tweets = $twitterOutput->tweet;
	
	$html = '<ul>';
	foreach($tweets as $tweet){
		$html .= '<li><span>'.$tweet->username.'</span> '.$tweet->text.'</li>';
	};
	$html .= '</ul>';
	
	echo $html;
}

// text functions
function readText($filenameText){
	if (file_exists($filenameText)){
		$openTextfileRead = fopen($filenameText,"r");
		$text = '<p>';
		while(! feof($openTextfileRead)){
			$readTextdoc = fgets($openTextfileRead)."<br/>";
			$text .= $readTextdoc;
		}
		$text .= "</p>";
		echo $text;
		fclose($openTextfileRead);
	}
	else{
		$errorText = "text file doesn't exist";
		echo $errorText;
	}
}

// CSV function
function readCSV($filenameCsv){
	if (file_exists($filenameCsv)){
		$row = 1;
		if(($openCsvfileRead = fopen($filenameCsv,"r")) !== false){
			$csv = "<ul>";
			while(($csvData = fgetcsv($openCsvfileRead, 1000, ",")) !== false){
				$num = count($csvData);
				$row++;
				$csv .= "<li><h3>$csvData[0]</h3> $csvData[1]</li>";
			}
			$csv .= "</ul>";
			echo $csv;
			fclose($openCsvfileRead);
		}
		else{
			$errorCsv = "<p>Can't open csv file</p>";
		}
	}
	else{
		$errorCsv = "<p>csv file doesn't exist</p>";	
	}
}

// movieRatings
function movieRating($url){
	$xml = simplexml_load_file($url) or die ('error: load xml');	
	$movies = $xml->movies;
	$html = '<ul>';
	
	foreach ($movies->movie as $movie) {
		$html .= '<li><h4>'.$movie->title.'</h4><div class="outBar" ><span class="bar" style="width:'.$movie->rating.'%;"></span></div></li>';
	}
	$html .='</ul>';
	echo $html;
}

?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="css/style.css"/>
<script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="js/jquery.easing.min.js"></script>
<script type="text/javascript" src="js/jquery.easy-ticker.js"></script>
<script type="text/javascript" src="js/jquery.cycle.all.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<title>Studio Ghibli Fansite</title>
</head>

<body>
<div class="wrapper">
  <header class="indexHeader">
    <div class="studioGhibliLogo"></div>
    <div class="indexHeaderTitle">
      <h1>Studio Ghibli Fansite</h1>
      <p>Fansite over Studio Ghibli v0.8</p>
      <?php loginCheck(); ?>
    </div>
    <div id="fade">
      <div id="afb1"></div>
      <div id="afb2"></div>
      <div id="afb3"></div>
      <div id="afb4"></div>
      <div id="afb5"></div>
      <div id="afb6"></div>
      <div id="afb7"></div>
      <div id="afb8"></div>
      <div id="afb9"></div>
      <div id="afb10"></div>
    </div>
  </header>
  <section class="indexSection">
    <div class="leftColumn">
      <div class="text">
        <h2>About Gibli</h2>
        <?php readText($filenameText);?>
      </div>
      <div class="react">
        <h2>Reageren</h2>
        <?php reachtcheck(); ?>
      </div>
      <div class="reactions">
      	<h2>Reacties</h2>
        <?php readCSV($filennameCSV); ?>
      </div>
    </div>
    <div class="rightColumn">
      <div class="rssfeed">
        <?php RSSFeed($rssFeedUrl);?>
      </div>
      <div class="movieRatings">
      	<h2>Movie Ratings</h2>
      	<?php movieRating($xmlMovieRating); ?>
      </div>
    </div>    
  </section>
  <footer class="footer">
  <div id="twitterLogo"></div>
  <div class="twitterFeed">
  	<?php twitterfeed('gibli');?>
  </div>
  </footer>
</div>
</body>
</html>