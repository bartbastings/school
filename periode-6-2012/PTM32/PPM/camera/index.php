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
  </header>
  <section>
  <h3>Tijd</h3>
  <?php
  echo date("m-d-y G.i:s", time()).'<br/>';
  echo 'Interval time: '.$hour;
  ?>
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
  <footer>
  </footer>
</div>
</body>
</html>
