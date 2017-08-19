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
	echo 'People count: '.$peopleCount.'<br/>';
	echo 'Camera total value: '.$PPMCameraTotal.'<br/>';
	?>
  </header>
  <section class="ppm">
  	<h2>Camera 1</h2>
    <?php
    echo 'Camera One In value: '.$PPMCameraOneIn.'<br/>';
	echo 'Camera One Out value: '.$PPMCameraOneOut.'<br/>';
	echo '<br/>';
	echo 'Camera One Total value: '.$PPMCameraOneTotal.'<br/>';
	?>
    <h2>Camera 2</h2>
    <?php
    echo 'Camera Two In value: '.$PPMCameraTwoIn.'<br/>';
	echo 'Camera Two Out value: '.$PPMCameraTwoOut.'<br/>';
	echo '<br/>';
	echo 'Camera Two Total value: '.$PPMCameraTwoTotal.'<br/>';
	?>
    <h2>Camera 3</h2>
    <?php
    echo 'Camera Three In value: '.$PPMCameraThreeIn.'<br/>';
	echo 'Camera Three Out value: '.$PPMCameraThreeOut.'<br/>';
	echo '<br/>';
	echo 'Camera Three Total value: '.$PPMCameraThreeTotal.'<br/>';
	?>
    <h2>Camera 4</h2>
    <?php
    echo 'Camera Four In value: '.$PPMCameraFourIn.'<br/>';
	echo 'Camera Four Out value: '.$PPMCameraFourOut.'<br/>';
	echo '<br/>';
	echo 'Camera Four Total value: '.$PPMCameraFourTotal.'<br/>';
	?>
    <h2>Camera 5</h2>
    <?php
    echo 'Camera Five In value: '.$PPMCameraFiveIn.'<br/>';
	echo 'Camera Five Out value: '.$PPMCameraFiveOut.'<br/>';
	echo '<br/>';
	echo 'Camera Five Total value: '.$PPMCameraFiveTotal.'<br/>';
	?>
    <h2>Camera Total</h2>
    <?php
    echo 'Camera total value: '.$PPMCameraTotal.'<br/>';
	?>
  </section>
  <footer> </footer>
</div>
</body>
</html>
