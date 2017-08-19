<?php
include('includes/connect.php');
include('includes/functions.php');
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Stratumseind 2.0</title>
<link rel="shortcut icon" href="style/favicon.ico"/>
<link rel="stylesheet" href="style/style.css"/>
</head>
<body>
<div class="wrapper">
  <header>
    <h1>Stratumseind 2.0</h1>
    <h2>Time</h2>
    <?php
    echo date("m-d-y G:i:s", time()).'<br/>';
	echo 'Interval time PPM: '.$hourPPM.'<br/>';
	echo 'Interval time Sound: '.$hourSound.'<br/>';
	?>
    <h2>FacebookLogin</h2>
    <?php
    if ($user){
		echo $logout_facebook;
	}
	else{
		echo $login_facebook;
	}
	?>
  </header>
  <section class="ppm">
  	<h2>Date Sort</h2>
    <?php
    echo 'Camera One In value: '.$PPMCameraOneInSort;
	?>
    <h2>People Flow Rate</h2>
    <h3>Camera One</h3>
    <?php  
  echo 'Camera One In: '.$PPMCameraOneIn.'<br/>';
  echo 'Camera One Out: '.$PPMCameraOneOut.'<br/>';
  echo 'Camera One In Count: '.$PPMCameraOneInCount.'<br/>';
  echo 'Camera One Out Count: '.$PPMCameraOneOutCount.'<br/>';
  echo 'PPMCamera One Total: '.$PPMCameraOneTotal.'<br/>';
  ?>
    <h3>Camera Two</h3>
    <?php
  echo 'Camera Two In: '.$PPMCameraTwoIn.'<br/>';
  echo 'Camera Two Out: '.$PPMCameraTwoOut.'<br/>';
  echo 'Camera Two In Count: '.$PPMCameraTwoInCount.'<br/>';
  echo 'Camera Two Out Count: '.$PPMCameraTwoOutCount.'<br/>';
  echo 'PPMCamera Two Total: '.$PPMCameraTwoTotal.'<br/>';
  ?>
    <h3>Camera Three</h3>
    <?php
  echo 'Camera Three In: '.$PPMCameraThreeIn.'<br/>';
  echo 'Camera Three Out: '.$PPMCameraThreeOut.'<br/>';
  echo 'Camera Three In Count: '.$PPMCameraThreeInCount.'<br/>';
  echo 'Camera Three Out Count: '.$PPMCameraThreeOutCount.'<br/>';
  echo 'PPMCamera Three Total: '.$PPMCameraThreeTotal.'<br/>';
  ?>
    <h3>Camera Four</h3>
    <?php
  echo 'Camera Four In: '.$PPMCameraFourIn.'<br/>';
  echo 'Camera Four Out: '.$PPMCameraFourOut.'<br/>';
  echo 'Camera Four In Count: '.$PPMCameraFourInCount.'<br/>';
  echo 'Camera Four Out Count: '.$PPMCameraFourOutCount.'<br/>';
  echo 'PPMCamera Four Total: '.$PPMCameraFourTotal.'<br/>';
  ?>
    <h3>Camera Five</h3>
    <?php
  echo 'Camera Five In: '.$PPMCameraFiveIn.'<br/>';
  echo 'Camera Five Out: '.$PPMCameraFiveOut.'<br/>';
  echo 'Camera Five In Count: '.$PPMCameraFiveInCount.'<br/>';
  echo 'Camera Five Out Count: '.$PPMCameraFiveOutCount.'<br/>';
  echo 'PPMCamera Five Total: '.$PPMCameraFiveTotal.'<br/>';
  ?>
    <h3>Camera Total</h3>
    <?php
  echo 'Camera Total: '.totalPeople($PPMCameraOneTotal,$PPMCameraTwoTotal,$PPMCameraThreeTotal,$PPMCameraFourTotal,$PPMCameraFiveTotal).'<br/>';
  ?>
  </section>
  <section class="sound">
    <h2>Noise Level</h2>
    <h3>Sound Level Average</h3>
    <?php
  echo 'Sound level average: '.$SoundLevelAverage.'<br/>';
  echo 'Sound level average date: '.$SoundLevelAverageDate.'<br/>';
  echo 'Sound level average count: '.$SoundLevelAverageCount.'<br/>';
  echo 'Sound Level On Street Average: '.$SoundLevelOnStreetAverage.'<br/>';
  echo 'Sound Level On Street Average date: '.$SoundLevelOnStreetAverageDate.'<br/>';
  echo 'Sound Level On Street Average count: '.$SoundLevelOnStreetAverageCount.'<br/>';
  echo 'Sound Level Behind Street Average: '.$SoundLevelBehindStreetAverage.'<br/>';
  echo 'Sound Level Behind Street Average date: '.$SoundLevelBehindStreetAverageDate.'<br/>';
  echo 'Sound Level Behind Street Average count: '.$SoundLevelBehindStreetAverageCount.'<br/>';
  ?>
    <h3>Sound Level Highest</h3>
    <?php
  echo 'Sound level Highest: '.$SoundLevelHighest.'<br/>';
  echo 'Sound level Highest count: '.$SoundLevelHighestCount.'<br/>';
  //echo 'Sound Level On Street Highest: '.$SoundLevelOnStreetHighest.' &#42;<br/>';
  //echo 'Sound Level On Street Highest count: '.$SoundLevelOnStreetHighestCount.' &#42;<br/>';
  //echo 'Sound Level Behind Street Highest: '.$SoundLevelBehindStreetHighest.' &#42;<br/>';
  //echo 'Sound Level Behind Street Highest count: '.$SoundLevelBehindStreetHighestCount.' &#42;<br/>';
  ?>
    <h3>Sound Level One</h3>
    <?php
  //echo 'Sound level One: '.$SoundLevelOne.' &#42;<br/>';
  //echo 'Sound level One count: '.$SoundLevelOneCount.' &#42;<br/>';
  echo 'Sound Level One On Street: '.$SoundLevelOneOnStreet.'<br/>';
  echo 'Sound Level One On Street count: '.$SoundLevelOneOnStreetCount.'<br/>';
  echo 'Sound Level One Behind Street: '.$SoundLevelOneBehindStreet.'<br/>';
  echo 'Sound Level One Behind Street count: '.$SoundLevelOneBehindStreetCount.'<br/>';
  ?>
    <h3>Sound Level Two</h3>
    <?php
  //echo 'Sound level Two: '.$SoundLevelTwo.' &#42;<br/>';
  //echo 'Sound level Two count: '.$SoundLevelTwoCount.' &#42;<br/>';
  echo 'Sound Level Two On Street: '.$SoundLevelTwoOnStreet.'<br/>';
  echo 'Sound Level Two On Street count: '.$SoundLevelTwoOnStreetCount.'<br/>';
  echo 'Sound Level Two Behind Street: '.$SoundLevelTwoBehindStreet.'<br/>';
  echo 'Sound Level Two Behind Street count: '.$SoundLevelTwoBehindStreetCount.'<br/>';
  ?>
    <h3>Sound Level Three</h3>
    <?php
  //echo 'Sound level Three: '.$SoundLevelThree.' &#42;<br/>';
  //echo 'Sound level Three count: '.$SoundLevelThreeCount.' &#42;<br/>';
  echo 'Sound Level Three On Street: '.$SoundLevelThreeOnStreet.'<br/>';
  echo 'Sound Level Three On Street count: '.$SoundLevelThreeOnStreetCount.'<br/>';
  echo 'Sound Level Three Behind Street: '.$SoundLevelThreeBehindStreet.'<br/>';
  echo 'Sound Level Three Behind Street count: '.$SoundLevelThreeBehindStreetCount.'<br/>';
  ?>
    <!--<h3>Sound Level Four</h3>-->
    <?php
  //echo 'Sound level Four: '.$SoundLevelFour.' &#42;<br/>';
  //echo 'Sound level Four count: '.$SoundLevelFourCount.' &#42;<br/>';
  //echo 'Sound Level Four On Street: '.$SoundLevelFourOnStreet.' &#42;<br/>';
  //echo 'Sound Level Four On Street count: '.$SoundLevelFourOnStreetCount.' &#42;<br/>';
  //echo 'Sound Level Four Behind Street: '.$SoundLevelFourBehindStreet.' &#42;<br/>';
  //echo 'Sound Level Four Behind Street count: '.$SoundLevelFourBehindStreetCount.' &#42;<br/>';
  ?>
    <h3>Sound Level Five</h3>
    <?php
  //echo 'Sound level Five: '.$SoundLevelFive.' &#42;<br/>';
  //echo 'Sound level Five count: '.$SoundLevelFiveCount.' &#42;<br/>';
  //echo 'Sound Level Five On Street: '.$SoundLevelFiveOnStreet.' &#42;<br/>';
  //echo 'Sound Level Five On Street count: '.$SoundLevelFiveOnStreetCount.' &#42;<br/>';
  echo 'Sound Level Five Behind Street: '.$SoundLevelFiveBehindStreet.'<br/>';
  echo 'Sound Level Five Behind Street count: '.$SoundLevelFiveBehindStreetCount.'<br/>';
  ?>
    <h3>Sound Level Six</h3>
    <?php
  //echo 'Sound level Six: '.$SoundLevelSix.' &#42;<br/>';
  //echo 'Sound level Six count: '.$SoundLevelSixCount.' &#42;<br/>';
  //echo 'Sound Level Six On Street: '.$SoundLevelSixOnStreet.' &#42;<br/>';
  //echo 'Sound Level Six On Street count: '.$SoundLevelSixOnStreetCount.' &#42;<br/>';
  echo 'Sound Level Six Behind Street: '.$SoundLevelSixBehindStreet.'<br/>';
  echo 'Sound Level Six Behind Street count: '.$SoundLevelSixBehindStreetCount.'<br/>';
  ?>
  <!--<p>&#42; staat niet in de datalijst</p>-->
  </section>
  <footer> </footer>
</div>
</body>
</html>
