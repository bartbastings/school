<?php
session_start();
include 'connectie_wijnwinkel.php';

// Hier worden de gegevens opgehaald uit de database

$voorletters = $_POST["voorletters"];
$tussenvoegsel = $_POST["tussenvoegsel"];
$naam = $_POST["naam"];
$adres = $_POST["adres"];
$huisnummer = $_POST["huisnummer"];
$telefoon = $_POST["telefoon"];
$postcode = $_POST["postcode"];
$woonplaats = $_POST["woonplaats"];
$geslacht = $_POST["geslacht"];
$email = $_POST["email"];
$wachtwoord = $_POST["wachtwoord"];
$status = "actief";
$datumin = date("Y-m-d");


$query='SELECT MAX($klantnummer) as `max` FROM klant';
$result = mysql_query($query) or die(mysql_error());exit($query);
$record = mysql_fetch_array($result);exit($query);
$klantnummer = $record[0] + 1; // Hier wordt een nieuwklant nummer voor een nieuwe gebruiker gerenegeerd


// toevoegen in tabel

$query="INSERT INTO klant  ('$klantnummer', '$voorletters', '$tussenvoegsel', '$naam', '$adres', '$huisnummer', '$woonplaats', '$postcode', '$geslacht', '$telefoon', '$mail', '$wachtwoord',  '$datumin', '$status')";
// weer de klant nummer wordt niet gevonden.
exit($query);
$result = mysql_query(stripslashes($query)) or die(mysql_error());

echo $query;

//als gegevens zijn toegevoegd in de tabel keert de klant terug naar inlog pagina
if (isset($result))
{
    header ("Location: inloggen.php");
    exit;
}
?>
     </div>


</body>
</html>

   