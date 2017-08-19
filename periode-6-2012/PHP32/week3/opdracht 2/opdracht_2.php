<?php
$oefening = 2;

include('html_kop.inc.php');

echo "\n<h1>Opdracht $oefening</h1>\n";

if(isset($_POST['aanmelden'])){
	//echo email($_POST['email']);
	//echo naam($_POST['naam']);
	//echo woonplaats($_POST['woonplaats']);
	
$list = array (
array (email($_POST['email']), naam($_POST['naam']), woonplaats($_POST['woonplaats'])));

//  door de code te beveiligen tegen html en sql zijn er geen problemen opgelopen.

$handle = fopen('bestand.csv', 'a');

foreach ($list as $row) {
	    fputcsv($handle, $row);
}

fclose($handle);

}

function naam($naam){
	if(is_numeric($naam)){
		return "geen nummers";
	}
	
	else{
		$naam = htmlentities($naam);
		$naam .= mysql_real_escape_string($naam);
		return $naam;
	}
}

function email($email){
	$blacklist = array('to','cc','bcc');
	foreach($blacklist as $item)
	if(stripos($email, $item)){
	$email="";
	return $email;
	}
	else{
		$email = htmlentities($email);
		$email .= mysql_real_escape_string($email);
		return $email;
	}
}

function woonplaats($woonplaats){
	$woonplaats = htmlentities($woonplaats);
	$woonplaats .= mysql_real_escape_string($woonplaats);
	return "$woonplaats";
}



error_reporting(E_ALL); 

?>

<form action="" method="post">
 <table>
        <tr>
        	<td>Email</td>
            <td><input type="email" name="email" value="" /></td>
		</tr>
        <tr>
        	<td>Naam</td>
            <td><input type="text" name="naam" value="" /></td>
		</tr>
        <tr>
        	<td>Woonplaats</td>
            <td><input type="text" name="woonplaats" value="" /></td>
		</tr>
        <tr>
        	<td colspan="2"><input type="submit" name = "aanmelden" value="Login"/></td>
        </tr>          
</table>           
</form>

<?php
include('html_staart.inc.php');
?>
