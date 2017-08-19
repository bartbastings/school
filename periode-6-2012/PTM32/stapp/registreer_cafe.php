<?php
session_start();
include 'include.php';

// Hier worden de gegevens opgehaald uit de database



$naam = $_POST["naam"];
$adres = $_POST["adres"];
$email = $_POST["email"];
$wachtwoord =md5 ($_POST["wachtwoord"]);
$encrypt_wachtwoord=md5($wachtwoord);
//$status = "actief";


$query='SELECT MAX(caf_id) as `max` FROM tbl_cafe';
$result = mysqli_query($db,$query) or die(mysqli_error());
$record = mysqli_fetch_array($result);
$userid = $record[0] + 1; // Hier wordt een nieuwklant nummer voor een nieuwe gebruiker gerenegeerd


// toevoegen in tabel

$query="INSERT INTO tbl_cafe VALUES ('$userid', '$naam', '$email', '$wachtwoord', '$adres')";
$result = mysqli_query($db,stripslashes($query)) or die(mysqli_error());

//als gegevens zijn toegevoegd in de tabel keert de klant terug naar inlog pagina
if (isset($result))
{
    header ("Location: inloggen_cafe.php");
    exit;
}
?>
     </div>


</body>
</html>

   