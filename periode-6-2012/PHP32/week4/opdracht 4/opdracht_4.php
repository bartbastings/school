<?php
$oefening = 4;

include('html_kop.inc.php');

echo "\n<h1>Opdracht $oefening</h1>\n";

echo "\n<h3>filteren van data</h3>\n";


if (($handle = fopen("sport.csv", "r")) !== FALSE) {
   echo "<table>"; 
	while (($data = fgetcsv($handle, 500, ",")) !== FALSE) {

		echo "<tr>";
		$num = count($data);
		
		for ($c=0; $c < $num; $c++) {
			
			// ik zorg hier ervoor dat de - weg wordt gehaald, maar ik kam er niet achter hoe ik de letters/ worden voor de - weg kan halen.
			
			$keywords = preg_split("#[-$]#", "$data[$c]");
			
			echo "<td>";
			//echo $data[$c];		
			//print_r( $keywords[0] );
			echo $data[$c];
			echo "</td>";

		//}
		//else{ "fout";
		//}
		
	}
		
		echo "</tr>";

    }
	
	echo "</table>";
    fclose($handle);
}

include('html_staart.inc.php');
?>
