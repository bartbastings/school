<?php
header('Content-type: application/json');
// de hoofd array aanmaken waar alle data inkomt
$adressen = array();
// inlezen van de CSV data (zie ook voorbeelden week 3)
if (($handle = fopen("data.csv", "r"))) {
    	
    while (($adres = fgetcsv($handle, 0, ","))) {
    	// een nieuw element toevoegen aan de array addressen:
		$adressen[] = array('adres'=>$adres);
    }
fclose($handle);

echo json_encode(array('adressen'=>$adressen));
}
?> 