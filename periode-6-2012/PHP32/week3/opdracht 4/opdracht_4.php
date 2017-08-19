<?php
$oefening = 4;

include('html_kop.inc.php');

echo "\n<h1>Opdracht $oefening</h1>\n";

if (($handle = fopen("http://datasets.flowingdata.com/tv-earners/top-tv-earners.csv", "r")) !== FALSE) {
    echo "<table>"; 
	while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
		echo "<tr>";
		//$keywords = preg_split("/[\s,]+/", $data[0]);
		//print_r( $keywords[0]);
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




include('html_staart.inc.php');
?>
