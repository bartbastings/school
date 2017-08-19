<?php

include('inlcudes/connect.php');
session_start();
 

if (isset($_POST['username']) && isset($_POST['password'])){
	
	$loginUsername=mysql_real_escape_string($_POST['username']); 
	$loginPassword=mysql_real_escape_string($_POST['password']); 
	
	$salt = sha1(md5($loginPassword));
	$loginPassword = md5($loginPassword.$salt);
	$loginPasswordEncrypt = hash("sha512", $loginPassword);
	
	$loginQuery="SELECT userid, name, surname, email, username, password FROM users WHERE username='$loginUsername' AND password='$loginPasswordEncrypt'";
	$loginResult = mysql_query($loginQuery);
	$loginRecord = mysql_fetch_assoc($loginResult);
	
	$_SESSION['userid'] = $loginRecord['userid'];
	$_SESSION['name'] = $loginRecord['name'];
	$_SESSION['surname'] = $loginRecord['surname'];
	$_SESSION['email'] = $loginRecord['email'];
	$_SESSION['username'] = $loginRecord['username'];
	
	$dbUsername = $loginRecord['username'];
	$dbPassword = $loginRecord['password']; 
	
	if ($loginUsername == $dbUsername && $loginPasswordEncrypt == $dbPassword){
		header('Location: welcome.php');
		exit;
	}
	else{
		$error='Uw gebruikersnaam en wachtwoord komen niet overeen met onze gegevens';
	};
};
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>PHP Eindopdracht</title>
<link rel="stylesheet" href="css/style.css"/>
<link rel="shortcut icon" href="css/favicon.ico"/>
</head>
<body>
<div class="wrapper">
  <h1>Inloggen</h1>
  <form action="index.php" method="post">
    <label>Username: </label>
    <input type="text" name="username" value="<?php echo $_SESSION['username']; ?>" />
    <label>Password: </label>
    <input type="password" name="password" value="" />
    <input class="inputbutton" type="submit" name="login" value="Login"/>
  </form>
  <p class="error"><?php echo $error; ?></p>
  <p class="registrationSucces"><?php echo $registrationSucces; ?></p>
  <a class="button" href="register.php">Register</a>
<div class="clear"></div>
</div>
</body>
</html>