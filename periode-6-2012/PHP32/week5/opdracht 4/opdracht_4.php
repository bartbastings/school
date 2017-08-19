<?php
$oefening = 4;

include('html_kop.inc.php');

echo "\n<h1>Opdracht $oefening</h1>\n";

echo "\n<h3>JSON Server-side verwerken</h3>\n";


$url = "http://maps.googleapis.com/maps/api/geocode/json?address=15+Mheerderweg,Banholt&sensor=false&region=nl";


	// Get that website's content
	$handle = fopen($url, "r");
	
	// If there is something, read and return
	if ($handle) {
		// zolang het einde van de file niet is bereikt, loop  door de file
	    while (!feof($handle)) {
	    	// fgets: lees de file regel voor regel
	        $buffer = fgets($handle, 1000);
			// echo elke regel
	        echo $buffer;
	    }
	    fclose($handle);
	}
?>

<form action="" method="post">
 <table>
        <tr>
        	<td>Route</td>
            <td><input type="text" name="route" value="" /></td>
		</tr>
        <tr>
        	<td>House Number</td>
            <td><input type="number" name="number" value="" /></td>
		</tr>
        <tr>
        	<td>Place</td>
            <td><input type="text" name="place" value="" /></td>
		</tr>
      
        <tr>
        	<td colspan="2"><input type="submit" name = "search" value="search"/></td>
        </tr>          
</table>           
</form>
<?php

$route = urlencode($_POST['route']);
$number = urlencode($_POST['number']);
$place = urlencode($_POST['place']);

if(isset($_POST['search'])){

$new = "http://maps.googleapis.com/maps/api/geocode/json?address=$number+$route,$place&sensor=false&region=nl";


	// Get that website's content
	$handle = fopen($new, "r");
	
	// If there is something, read and return
	if ($handle) {
		// zolang het einde van de file niet is bereikt, loop  door de file
	    while (!feof($handle)) {
	    	// fgets: lees de file regel voor regel
	        $buffer = fgets($handle, 1000);
			// echo elke regel
	        echo $buffer;
	    }
	    fclose($handle);
	}
}

include('html_staart.inc.php');
?>
