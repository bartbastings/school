<?php
$oefening = 3;

include('html_kop.inc.php');

echo "\n<h1>Opdracht $oefening</h1>\n";

echo "\n<h2>opslaanCSV</h2>\n";

if (($handle = fopen("bestand.csv", "r")) !== FALSE) {
    echo "<table>"; 
	while (($data = fgetcsv($handle, 0, ",")) !== FALSE) {
		echo "<tr>";
		$num = count($data);
		for ($c=0; $c < $num; $c++) {
			echo "<td>";
			echo $data[$c];
			echo "</td>";
        }
		
		echo "</tr>";

    }
	
	echo "</table>";
    fclose($handle);
}

if (isset($_POST['nieuws'])){
    $data[$c] = $_POST['nieuwa'];
	unlink("bestand.csv");
}

include('html_staart.inc.php');
?>
