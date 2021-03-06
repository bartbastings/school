<?php
session_start();

include ('include.php');
include ('functies.php');	

// Controleer of het email adres al bestaat in de database
function valid_email($str){
	global $db;
    $query = "SELECT caf_email FROM tbl_cafe WHERE caf_email = '".$str."'";
	// Hier wordt het emailadress ingevoerd 
    $result = mysqli_query($db,$query) or die(mysqli_error());
    $record = mysqli_fetch_array($result);
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

if (isset($_POST['naam'])){
    $naam = veilig($_POST['naam']);
    $naam = strtolower($naam);
 
}
if (isset($_POST['adres'])){
    $adres = veilig($_POST['adres']);
    $adres = strtolower($adres);
    
}

if (isset($_POST['email'])){
    $email = veilig($_POST['email']);
	$email = mailOk($_POST['email']);
    $email = strtolower($email);
}
if (isset($_POST['wachtwoord1'])){
    $wachtwoord1 = veilig($_POST['wachtwoord1']);
}
if (isset($_POST['wachtwoord2'])){
    $wachtwoord2 = veilig($_POST['wachtwoord2']);
}
if (isset($_POST['verzenden'])){
    $verzendknop = $_POST['verzenden'];
}


// kijken of alles geldig is ingevoerd.
// De functie Valid checkt nog of alles naar behoren is ingevuld


if ( empty($verzendknop) || !validate_email($email) || !validate_wachtwoord ($wachtwoord1) ||!valid_email($email) || !valid_passwd($wachtwoord1, $wachtwoord2 )){

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
            <td>Naam</td>
            <td><input type="text" style="text-transform: none" name="naam" maxlength="30" <?php if (!empty($naam)) echo 'value = "'.$naam.'"'; ?>></input></td>
            <td></td>
        </tr>
        <tr>
            <td>Adres</td>
            <td><input type="text" name="adres" maxlength="30" <?php if (!empty($adres)) echo 'value="'.$adres.'"' ?>></input></td>
            <td></td>
        </tr>
       
    
        <tr>
            <td>Email</td>
            <td><input type="text" name="email" maxlength="30" <?php if (!empty($email)) echo 'value = "'.$email.'"'; ?>></input>  </td>
            <td><?php if (!empty($verzendknop) && !valid_email($email)) echo "Dit emailadres bestaat al, vul een nieuwe in"; if (!empty($verzendknop) && !validate_email($email)) echo "Dit emailadres is niet goed ingevuld";?></td>
			 
	   </tr>
        <tr>
            <td>Wachtwoord</td>
            <td><input type="password" name="wachtwoord1" maxlength="15" <?php if (!empty($wachtwoord1)) echo 'value = "'.$wachtwoord1.'"' ?>></input></td>
            <td><?php if (!empty($verzendknop) && !valid_passwd($wachtwoord1, $wachtwoord2)) echo "Wachtwoord komt niet overeen of er is geen wachtwoord ingevuld"; if (!empty($verzendknop) && !validate_wachtwoord ($wachtwoord1)) echo  "Dit wachtwoord voldoet niet aan de eisen!"; ?></td>
        </tr>
        <tr>
            <td>Herhaal wachtwoord</td>
            <td><input type="password" name="wachtwoord2" maxlength="15" <?php if (!empty($wachtwoord2)) echo 'value = "'.$wachtwoord2.'"'?>></input></td>
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
                <td>Naam</td>
                <td><?php echo $naam ?></td>
            </tr>
            <tr>
                <td>Adres</td>
                <td><?php echo $adres ?></td>
            </tr>
        
            <tr>
                <td>Email</td>
                <td><?php echo $email ?></td>
            </tr>
            <tr>
                <td><form method="post" action ="account_cafe.php"><input type="submit" value="Opnieuw" name="opnieuw"></input></form></td>
                <td><form method="post" action="registreer_cafe.php">
                        <input type="hidden" name="naam" value="<?php echo $naam;?>"></input>
                        <input type="hidden" name="adres" value="<?php echo $adres;?>"></input>
                       
                       
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



