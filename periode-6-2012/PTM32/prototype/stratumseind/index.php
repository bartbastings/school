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
	<form method='post' action='result.php'>
	<label>Select tabel name: </label>
	<select name='tableOption'>
    <?php
    foreach ($arrayTableNames as $i) {
		echo "<option value='$i'>$i</option>";
	}
	?>
	</select>
	<label>Select aantal uren: </label>
	<select name='hourOption'>
    <?php
	foreach ($arrayHour as $i) {
		echo "<option value='$i'>$i</option>";
	}
	?>
	</select>
	<input type='submit' value='submit' name='submit'>
	</form>
    </section>
  <footer>
  </footer>
</div>
</body>
</html>
