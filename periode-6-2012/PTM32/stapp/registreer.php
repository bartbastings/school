<?php
session_start();
include 'include.php';

// Hier worden de gegevens opgehaald uit de database


$email = $_POST["email"];
$geslacht = $_POST["geslacht"];
$wachtwoord =md5 ($_POST["wachtwoord"]);
$encrypt_wachtwoord=md5($wachtwoord);
//$status = "actief";


$query='SELECT MAX(user_id) as `max` FROM tbl_user';
$result = mysqli_query($db,$query) or die(mysqli_error());
$record = mysqli_fetch_array($result);
$userid = $record[0] + 1; // Hier wordt een nieuwklant nummer voor een nieuwe gebruiker gerenegeerd


// toevoegen in tabel

$query="INSERT INTO tbl_user VALUES ('$userid', '$email', '$wachtwoord', '$geslacht')";
$result = mysqli_query($db,stripslashes($query)) or die(mysqli_error());

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

   