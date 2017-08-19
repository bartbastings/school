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
    <a href="index.php">Back</a> </header>
  <section>
    <?php
    echo "<p>geselecteerde uur: $selectHourOption</p>";
	echo "<p>geselecteerde tabel: $selectTableOption</p>";
	
	$query = "SELECT * FROM stratumseind_data WHERE name='".$selectTableOption."' AND timestamp > (now()-interval'".$selectHourOption."')";
	$result = pg_query($query) or die('Query failed: ' . pg_last_error());
	echo "<table>";
	echo "<tr><th>Namer</th><th>Timestamp</th><th>Value</th></tr>";
	while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
		echo "<tr>";
		foreach ($line as $col_value) {
			echo "<td>$col_value</td>";
		}
		echo "</tr>";
	}
	echo "</table>";￼
  ?>
  </section>
  <footer> <a href="index.php">Back</a> </footer>
</div>
</body>
</html>
