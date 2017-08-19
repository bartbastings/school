<?php 	
// inloggen.php
// Hier wordt gecontroleerd of de klant het juiste wachtwoord heeft ingevoerd

    session_start();
    $error = ''; 
	
    if (isset($_POST['gebruikersnaam']) && isset($_POST['password']))
    {
        include('include.php');
		include ('functies.php');
		$gebruikersnaam = veilig($_POST['gebruikersnaam']);
		$password = veilig($_POST['password']);
		$password =md5 ($password);
		// hier worden de gegevens uit de database gehaald
		
        $query = 'SELECT caf_id, caf_naam, caf_email ,wachtwoord, caf_adres FROM tbl_cafe WHERE caf_email=\''.$gebruikersnaam.'\' AND wachtwoord=\''.$password.'\'';
		$result = mysqli_query($db,$query) or die(mysqli_error());
        $record = mysqli_fetch_assoc($result);
        // sessie variabelen opslaan
        $_SESSION['caf_id'] = $record['caf_id'];
        $_SESSION['caf_naam'] = $record['caf_naam'];
		$_SESSION['caf_email'] = $record['caf_email'];
        $_SESSION['wachtwoord'] = $record['wachtwoord'];
   		$_SESSION['caf_adres'] = $record['caf_adres'];

		// Hier wordt gecontroleerd in de database of de klant wel het juiste wachtwoord heeft ingevoerd
		
        $email = $record['caf_email'];
        $wachtwoord = $record['wachtwoord']; 
	
		
        if ($gebruikersnaam == $email && $password == $wachtwoord)
        {       
               $url = 'evenmenten.php'; // Hier wordt de klant doorgestuurd naar de juiste pagina (webwinkel)
               
                header("Location: $url");
                exit(); // Hier wordt het inlogscherm afgesloten       
        }
        else{
            $error = '<br />Uw gebruikersnaam en wachtwoord komen niet overeen met onze gegevens'; // hier komt de foutmelding als wachtwoord niet overeen komt
			echo $password;
		}
    }

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Inloggen</title>
</head>

<body>

<h1>Inloggen</h1>
<form action="" method="post">
Gebruikersnaam: <input type="text" name="gebruikersnaam" value="" />
     
           
Wachtwoord: <input type="password" name="password" value="" />
<input type="submit" name = "Login" value="Login"/>
</form>
      
<a href="account_cafe.php">Registreren</a>
<?php echo $error;?>
</body>
</html>
