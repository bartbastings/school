<?php
$oefening = 1;

include('html_kop.inc.php');

echo "\n<h1>Opdracht $oefening</h1>\n";

echo "\n<h3>script prce</h3>\n";


if(isset($_POST['aanmelden'])){
	
	$patroon = $_POST['patroon'];
	$test = $_POST['test'];
	
	
	if (preg_match($patroon, $test, $match)) {
		echo "Match gevonden: ";
		echo $match[0];
	}
	else{
		echo "Geen match gevonden";
	}

}

error_reporting(E_ALL); 

?>

<form action="" method="post">
 <table>
 		<tr>
 			<td colspan="2">
            <p></p>
 			</td>
 		</tr>
        <tr>
        	<td>Regular Expression Patroon</td>
            <td><input type="text" name="patroon" value="" /></td>
		</tr>
        <tr>
        	<td>Test de volgende regel</td>
            <td><input type="text" name="test" value="" /></td>
		</tr>
        <tr>
        	<td colspan="2"><input type="submit" name = "aanmelden" value="Test"/></td>
        </tr>          
</table>           
</form>

<?php

echo "\n<h3>Matches</h3>\n";

if(isset($_POST['aanmelden1'])){
	
	$area = $_POST['area'];
	$patroon1 = $_POST['patroon1'];
	$test1 = $_POST['test1'];
	
	// es, es.*, es.*?, es\S* en [a-z]*es\S*
	
	echo "\n<h2>es</h2>\n";
	
	$m = (preg_match_all("#es#", $area, $match1));
	if ($m) { 
		for ($j=0;$j<$m;$j++) { 
		echo $j.": ".$match1[0][$j]."<br/>";
		}
	}
	else{
		echo "Geen match gevonden";
	}
	
	echo "\n<h2>es.*</h2>\n";
	
	$n = (preg_match_all("#es.*#", $area, $match1));
	if ($n) { 
		for ($j=0;$j<$n;$j++) { 
		echo $j.": ".$match1[0][$j]."<br/>";
		}
	}
	else{
		echo "Geen match gevonden";
	}
	
	echo "\n<h2>es.*?</h2>\n";
	
	$n = (preg_match_all("#es.*?#", $area, $match1));
	if ($n) { 
		for ($j=0;$j<$n;$j++) { 
		echo $j.": ".$match1[0][$j]."<br/>";
		}
	}
	else{
		echo "Geen match gevonden";
	}
	
	echo "\n<h2>es\S*</h2>\n";
	
	$n = (preg_match_all("#es\S*#", $area, $match1));
	if ($n) { 
		for ($j=0;$j<$n;$j++) { 
		echo $j.": ".$match1[0][$j]."<br/>";
		}
	}
	else{
		echo "Geen match gevonden";
	}
	
	echo "\n<h2>[a-z]*es\S*</h2>\n";
	
	$n = (preg_match_all("#[a-z]*es\S*#", $area, $match1));
	if ($n) { 
		for ($j=0;$j<$n;$j++) { 
		echo $j.": ".$match1[0][$j]."<br/>";
		}
	}
	else{
		echo "Geen match gevonden";
	}

}

?>

<form action="" method="post">
 <table>
 		<tr>
 			<td colspan="2">
            <p></p>
 			</td>
 		</tr>
        <tr>
        	<td>Regular Expression Patroon</td>
            <td><input type="text" name="patroon1" value="niet in gebruik" /></td>
		</tr>
        <tr>
        	<td>Replacement</td>
            <td><input type="text" name="test1" value="niet in gebruik" /></td>
		</tr>
        <tr>
        	<td>Test de volgende regel</td>
        	<td><textarea rows="2" cols="20" name="area">Om het script te testen, mag je deze testzin gebruiken voor het beste resultaat.</textarea></td>
        </tr>
        <tr>
        	<td colspan="2"><input type="submit" name = "aanmelden1" value="Test"/></td>
        </tr>
</table>           
</form>

<?php

echo "\n<h3>functie/ opdracht2</h3>\n";

// de postcode moet met 4 cijfers beginnen en eindigen met 2 hoofdletters
function validate_postcode($postcode){
	if (preg_match("#^[0-9]{4}+\s{1}+[A-Z]{2}$#",$postcode,$match)){
		return "Valide postcode:".$match[0]."<br/>";
	}
	else{
		return "geen valide postcode<br />";
	}
	
}

//de email moet beginnen met een willekeurig teken, dan moet er een keer een @ er in staan. En als laatste de emial moet eindigen met com of nl. 
function validate_email($email){
	if (preg_match("#^.+@{1}.+.(com|nl)$#", $email, $match)) {
		return "Valide email:".$match[0]."<br />";
		}
	else{
		return "geen valide email<br />";
	}
}

//de functie controleert of er geen white space ertussen staat. Als dat match ie het geen valide wachtwoord
function validate_wachtwoord($wachtwoord){
	if (!preg_match("#\s#", $wachtwoord, $match)) {
		return "Valide wachtwoord:".$match[0]."<br />";
		}
	else{
		return "geen valide wachtwoord<br />";
	}
}

if (isset($_POST['valid'])){
	echo validate_postcode($_POST['postcode']);
	echo validate_email($_POST['email']);
	echo validate_wachtwoord($_POST['wachtwoord']);
}
?>

<form action="" method="post">
 <table>
 		<tr>
 			<td>postcode</td>
            <td><input type="text" name="postcode" value=""/></td>
 		</tr>
        <tr>
        	<td>email</td>
            <td><input type="text" name="email" value="" /></td>
		</tr>
        <tr>
        	<td>wachtword</td>
            <td><input type="password" name="wachtwoord" value="" /></td>
		</tr>
        <tr>
        	<td colspan="2"><input type="submit" name = "valid" value="Validate"/></td>
        </tr>          
</table>           
</form>

<?php
include('html_staart.inc.php');
?>
