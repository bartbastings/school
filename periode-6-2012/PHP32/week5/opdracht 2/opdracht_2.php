<?php
$oefening = 2;

include('html_kop.inc.php');

echo "\n<h1>Opdracht $oefening</h1>\n";

echo "\n<h3>Actors bestanden inlezen</h3>\n";

if (($handle = fopen("http://datasets.flowingdata.com/tv-earners/top-tv-earners.csv", "r")) !== FALSE) {
   echo "<table>"; 
	while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {

		echo "<tr>";
		
		$keywords = preg_split("/[\s,]+/", $data[0]);
		//echo( $keywords);
		//$givenname = array($keywords[0]);
		//$surname = array($keywords[1]);
				
		$actors = array("given name"=>$keywords[0],"surname"=>$keywords[1],"show" => $data[1], "Pay per episode" => $data[2], "Show Type" => $data[3]);
		
		echo "<td>";
		echo "acteur: ", json_encode($actors);
		echo "</td>";
		
		/*
		foreach($actors as $key => $value){
			echo $key.' : '.$value.'<br/>';
			}
		
		"show" => $data[1], "Pay per episode" => $data[2], "Show Type" => $data[3]
		echo "$actors[0]";
		
		$num = count($data);
		
		for ($c=0; $c < $num; $c++) {
			
			echo "<td>";
			echo $data[$c];
			echo "</td>";

		}
		*/
		echo "</tr>";

    }
	
	echo "</table>";
    fclose($handle);
}

include('html_staart.inc.php');
?>
