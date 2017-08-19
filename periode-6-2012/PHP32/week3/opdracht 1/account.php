<?php
//ORGINEEL
session_start();

include ('connectie_wijnwinkel.php');
include ('functie.php');
?>

        
<?php

// Controleer of het email adres al bestaat in de database
function valid_email($str){
    $query = 'SELECT email FROM klant WHERE email = \''.$str.'\''; // Hier wordt het emailadress ingevoerd 
	//$query = "SELECT email FROM klant WHERE email = '$str'";
    $result = mysql_query($query) or die(mysql_error());
    $record = mysql_fetch_array($result);
    if (!empty($record[0])){ 
		return false;
	}
    else {
		return true;
	}
}

// Controleer of de 2 keer ingevoerde wachtwoorden hetzelfde zijn
function valid_passwd($ww1, $ww2){
	if ($ww1 === $ww2 && $ww1 !=""){
		return true;
	}
	else {
		return false;
	}
}
	
	
//	omzetten invoervelden
// 	hier worden de gegevens verzonden
// 	hier worden ook de letters van klein naar groot omgezet
// 	Isset wordt gebruikt om te controleren of een variabele een waarde heeft.


// met strlen telt hij de aantal letters, en als je de maximale lengte overschrijdt krijg je een melding  
if (isset($_POST['voorletters'])){
    $voorletters = $_POST['voorletters'];
	if (strlen($voorletters) <= 10){
    $voorletters = strtoupper($voorletters);
	}
	else{
		$voorletters = "te veel letters";
	}
}
if (isset($_POST['tussenvoegsel'])){
    $tussenvoegsel = $_POST['tussenvoegsel'];
	if (strlen($tussenvoegsel) <= 10){
    $tussenvoegsel = strtolower($tussenvoegsel);
	}
	else{
		$tussenvoegsel = "te veel letters";
	}
}
if (isset($_POST['naam'])){
    $naam = $_POST['naam'];
	if(strlen($naam) <= 30){
    $naam = strtolower($naam);
    $naam = ucfirst($naam); // Deze functie zorgt ervoor dat de letter een hoofdletter is
	}
	else{
		$naam = "te veel letters";
	}
}
if (isset($_POST['adres'])){
    $adres = $_POST['adres'];
	if (strlen($adres) <= 30){
    $adres = strtolower($adres);
    $adres = ucfirst($adres);
	}
	else{
		$adres = "te veel letters";
	}
}
// eerst zorg ik ervoor dat ik alleen nummers in kan voeren, en dan pas de max lengte wat is ingesteld in php my admin
if (isset($_POST['huisnummer'])){
    $huisnummer = $_POST['huisnummer'];
	if(is_numeric($huisnummer)){
		if(strlen($huisnummer)<=10){
		$huisnummer;
		}
		else{
			$huisnummer = "te veel letters";
		}
	}
	else{
		$huisnummer = "geen cijfers";
	}
	
}
if (isset($_POST['postcode'])){
    $postcode = $_POST['postcode'];
    if(strlen($postcode) <=12){
		($postcode = substr($postcode,0,4)." ".substr($postcode,-2)); // Deze functie "checkt" of er binnen de waarde is gebleven die boven zijn gedefienieerd
		$postcode = strtoupper($postcode);
	}
	else{
		$postcode = "te veel letters";
	}
}
if (isset($_POST['woonplaats'])){
    $woonplaats = $_POST['woonplaats'];
	if(strlen($woonplaats) <= 30){
    $woonplaats = strtolower($woonplaats);
    $woonplaats = ucfirst($woonplaats);
	}
	else{
		$woonplaats = "te veel letters";
	}
}
if (isset($_POST['geslacht'])){
    $geslacht = $_POST['geslacht'];
	if(strlen($geslacht) <=10){
		$geslacht;
	}
	else{
		$geslacht = "te veel letters";
	}
}
else {$geslacht = 0;}

if (isset($_POST['telefoon'])){
    $telefoon = $_POST['telefoon'];
	if(is_numeric($telefoon)){
		if(strlen($telefoon) <=12){
			$telefoon;
		}
		else{
			$telefoon = "te veel nummers";
		}
	}
	else{
		$telefoon = "geen cijfers";
	}
}
if (isset($_POST['email'])){
    $email = $_POST['email'];
	if(strlen($email)<=30){
	if	(isset($_GET['mailOK'])){
		$email = 'fout';
   
	}
	else{
		 $email = strtolower($email);
	}
	}
	else{
		$email = "geen geldig email adres";
	}
}
if (isset($_POST['wachtwoord1'])){
    $wachtwoord1 = $_POST['wachtwoord1'];
	if(strlen($wachtwoord1)<=15){
		md5_file($wachtwoord1);
	}
	else{
		$wachtwoord1 = "geen geldig wachtwoord";
	}
}
if (isset($_POST['wachtwoord2'])){
    $wachtwoord2 = $_POST['wachtwoord2'];
	if(strlen($wachtwoord2)<=15){
		// wachtwoord beveiligt, het verschil tussen md5 en sha1 is dat de sleutel code van sha1 langer is dan md5. dus met andere woorden veiliger.
		md5_file($wachtwoord2);
	}
	else{
		$wachtwoord2 = "geen geldig wachtwoord";
	}
}
if (isset($_POST['verzenden'])){
    $verzendknop = $_POST['verzenden'];
}


// kijken of alles geldig is ingevoerd.
// De functie Valid checkt nog of alles naar behoren is ingevuld


if ( empty($verzendknop)  || !valid_email($email) || !valid_passwd($wachtwoord1, $wachtwoord2 )){
	
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Registreren</title>
</head>

<body> 
<h1>Registreren</h1>
<form method="POST" action="">
    <table>
        <tr>
            <td>Voorletters</td>
            <td><input type="text" name="voorletters" <?php if (!empty($voorletters)) echo 'value="'.$voorletters.'"' ?>></input></td>
            <td></td>
        </tr>
        <tr>
            <td>Tussenvoegsel</td>
            <td><input type="text" name="tussenvoegsel" <?php if (!empty($tussenvoegsel)) echo 'value="'.$tussenvoegsel.'"'?>></input></td>
            <td></td>
        </tr>
        <tr>
            <td>Naam</td>
            <td><input type="text" name="naam" <?php if (!empty($naam)) echo 'value = "'.$naam.'"'; ?>></input></td>
            <td></td>
        </tr>
        <tr>
            <td>Adres</td>
            <td><input type="text" name="adres" <?php if (!empty($adres)) echo 'value="'.$adres.'"' ?>></input></td>
            <td></td>
        </tr>
        <tr>
            <td>Huisnummer</td>
            <td><input type="text" name="huisnummer" <?php if (!empty($huisnummer)) echo 'value="'.$huisnummer.'"'?>></input></td>
            <td></td>
        </tr>
        <tr>
            <td>Postcode</td>
            <td><input type="text" name="postcode" <?php if (!empty($postcode)) echo 'value="'.$postcode.'"'?>></input></td>
            <td></td>
        </tr>
        <tr>
            <td>Woonplaats</td>
            <td><input type="text" name="woonplaats" <?php if (!empty($woonplaats)) echo 'value="'.$woonplaats.'"'?>></input></td>
            <td></td>
        </tr>
        <tr>
            <td>Geslacht</td>
            <td>Man <input type="radio" value="M" name="geslacht" <?php if (!empty($geslacht) && $geslacht == 'M') echo 'checked' ?>></input>
                Vrouw <input type="radio" value="V" name="geslacht" <?php if (!empty($geslacht) && $geslacht == 'V') echo 'checked' ?>></input></td>
            <td></td>
        </tr>
        <tr>
            <td>Telefoon</td>
            <td><input type="text" name="telefoon" <?php if (!empty($telefoon)) echo 'value ="'.$telefoon.'"'; ?>></input></td>
            <td></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="text" name="email" <?php if (!empty($email)) echo 'value = "'.$email.'"'; ?>></input>  </td>
            <td><?php if (!empty($verzendknop) && !valid_email($email)) echo "Dit emailadres bestaat al, vul een nieuwe in"?></td>
        </tr>
        <tr>
            <td><br/>Zakelijk</td>
        </tr>
        <tr>
            <td>Wachtwoord</td>
            <td><input type="password" name="wachtwoord1" <?php if (!empty($wachtwoord1)) echo 'value = "'.$wachtwoord1.'"' ?>></input></td>
            <td><?php if (!empty($verzendknop) && !valid_passwd($wachtwoord1, $wachtwoord2)) echo "Wachtwoord komt niet overeen of er is geen wachtwoord ingevuld"; ?></td>
        </tr>
        <tr>
            <td>Herhaal wachtwoord</td>
            <td><input type="password" name="wachtwoord2" <?php if (!empty($wachtwoord2)) echo 'value = "'.$wachtwoord2.'"'?>></input></td>
            <td></td>
        </tr>
        <tr>
            <td><input type="submit" value="Opnieuw" name="opnieuw"></input></td>
            <td><input type="submit" value="Verzenden" name="verzenden"></input></td>
        </tr>
    </table>
</form>

<?php
}
else{ ?>
        <p>Invulgegevens akkoord</p>
        <table>
            <tr>
                <td>Voorletters</td>
                <td><?php echo $voorletters ?></td>
            </tr>
            <tr>
                <td>Tussenvoegsel</td>
                <td><?php echo $tussenvoegsel ?></td>
            </tr>
            <tr>
                <td>Naam</td>
                <td><?php echo $naam ?></td>
            </tr>
            <tr>
                <td>Adres</td>
                <td><?php echo $adres ?></td>
            </tr>
            <tr>
                <td>Huisnummer</td>
                <td><?php echo $huisnummer ?></td>
            </tr>
            <tr>
                <td>Postcode</td>
                <td><?php echo $postcode ?></td>
            </tr>
            <tr>
                <td>Woonplaats</td>
                <td><?php echo $woonplaats ?></td>
            </tr>
            <tr>
                <td>Geslacht</td>
                <td><?php echo $geslacht ?></td>
            </tr>
            <tr>
                <td>Telefoon</td>
                <td><?php echo $telefoon ?></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><?php echo $email ?></td>
            </tr>
            <tr>
                <td><br/>Zakelijk</td>
            </tr>
            <tr>
                <td><form method="post" action ="account.php"><input type="submit" value="Opnieuw" name="opnieuw"></input></form></td>
                <td><form method="post" action="registreer.php">
                        <input type="hidden" name="voorletters" value="<?php echo $voorletters;?>"></input>
                        <input type="hidden" name="tussenvoegsel" value="<?php echo $tussenvoegsel; ?>"></input>
                        <input type="hidden" name="naam" value="<?php echo $naam; ?>"></input>
                        <input type="hidden" name="adres" value="<?php echo $adres;?>"></input>
                        <input type="hidden" name="huisnummer" value="<?php echo $huisnummer;?>"></input>
                        <input type="hidden" name="telefoon" value="<?php echo $telefoon;?>"></input>
                        <input type="hidden" name="postcode" value="<?php echo $postcode;?>"></input>
                        <input type="hidden" name="woonplaats" value="<?php echo $woonplaats;?>"></input>
                        <input type="hidden" name="geslacht" value="<?php echo $geslacht;?>"></input>
                        <input type="hidden" name="email" value="<?php echo $email;?>"></input>
                        <input type="hidden" name="wachtwoord" value="<?php echo $wachtwoord1;?>"></input>
                        <input type="submit" value="Verzenden" name="verzenden"></input>
                    </form>
                </td>
            </tr>
        </table>


<?php
}
?>
</body>
</html>



