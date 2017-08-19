<?php
include('inlcudes/htmlHead.php');
include('inlcudes/connect.php');
session_start();

$registerName=mysql_real_escape_string($_POST['name']);
$registerSurname=mysql_real_escape_string($_POST['surname']); 
$registerEmail=mysql_real_escape_string($_POST['email']); 
$registerUsername=mysql_real_escape_string($_POST['username']); 
$registerPassword=mysql_real_escape_string($_POST['password']); 
$registerConfirmPassword=mysql_real_escape_string($_POST['confirmpassword']); 

$registerNameBool = false;
$registerSurnameBool = false;
$registerEmailBool = false;
$registerUsernameBool = false;
$registerPasswordBool = false;

// inputfield name
if(!empty($_POST['name'])){
	if(preg_match('/^\S[a-zA-Z]{2,60}$/',$registerName)){
		$_SESSION['registerName'] = $registerName;
		$registerNameBool = true;
	}
	else{
		$errorName = 'error: name';
		$_SESSION['registerName'] = NULL;
	};
}
else{
	$errorName = 'Naam moet ingevuld worden';
};

// inputfield surname
if(!empty($_POST['surname'])){
	if(preg_match('/^\S[a-zA-Z]{2,60}$/',$registerSurname)){
		$_SESSION['registerSurname'] = $registerSurname;
		$registerSurnameBool = true;
	}
	else{
		$errorSurname = 'error: surname';
		$_SESSION['registerSurname'] = NULL;
	};
}
else{
	$errorSurname = 'Achternaam moet ingevuld worden';
};

// inputfield email
if(!empty($_POST['email'])){
	if(preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/',$registerEmail)){
		$_SESSION['registerEmail'] = $registerEmail;
		$registerEmailBool = true;
	}
	else{
		$errorEmail = 'error: email';
		$_SESSION['registerEmail'] = NULL;
	};
}
else{
	$errorEmail = 'Email moet ingevuld worden';
};

$result = mysql_query("SELECT username FROM users") or die($errorUsername = 'database error'.mysql_error());
$storeArray = array();
while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
    $storeArray[] =  $row['username'];  
}

// inputfield username
if(!empty($_POST['username'])){
	if(preg_match('/^\S{2,60}$/',$registerUsername)){
		if(!in_array($registerUsername, $storeArray)){
			$_SESSION['registerUsername'] = $registerUsername;
			$registerUsernameBool = true;
		}
		else{
			$errorUsername = 'Username bestaat al';
			$_SESSION['registerUsername'] = NULL;
		};
	}
	else{
		$errorUsername = 'error: username';
		$_SESSION['registerUsername'] = NULL;
	};
}
else{
	$errorUsername = 'Username moet ingevuld worden';
};

// inputfield password
if(!empty($_POST['password'])){
	if(preg_match('/^\S{2,60}$/',$registerPassword)){
		if($registerPassword == $registerConfirmPassword){
			$salt = sha1(md5($registerPassword));
			$registerPassword = md5($registerPassword.$salt);
			$registerPasswordEncrypt = hash("sha512", $registerPassword);
			$registerPasswordBool = true;
		}
		else{
			$errorPassword = 'password en confirm password zijn verschillend';
		};
	}
	else{
		$errorPassword = 'error: password';
	};
	
}
else{
	$errorPassword = 'Password moet ingevuld worden';
};

$registerQuery="INSERT INTO users(name, surname, email, username, password) VALUES('$registerName','$registerSurname', '$registerEmail', '$registerUsername', '$registerPasswordEncrypt');";

if($registerNameBool == true && $registerSurnameBool == true && $registerEmailBool == true && $registerUsernameBool == true && $registerPasswordBool == true){
	$result=mysql_query($registerQuery);
	$registrationSucces = 'Registration Successfully';
	$url = 'http://localhost:8888/PHP32_herkansing/eindopdracht/index.php';
	header('Location: $url');
	session_destroy();
	//echo 'registratie is succesvol';
	//echo '<a class='button' href="index.php">Login</a>';
	exit();
}
?>

<h1>Register</h1>
<form action="register.php" method="post">
  <label>Name: </label>
  <input type="text" name="name" value="<?php echo $_SESSION['registerName'] ?>" />
  <?php echo $errorName; ?>
  <label>Surname: </label>
  <input type="text" name="surname" value="<?php echo $_SESSION['registerSurname'] ?>" />
  <?php echo $errorSurname; ?>
  <label>Email: </label>
  <input type="email" name="email" value="<?php echo $_SESSION['registerEmail'] ?>"/>
  <?php echo $errorEmail; ?>
  <label>Username: </label>
  <input type="text" name="username" value="<?php echo $_SESSION['registerUsername'] ?>" />
  <?php echo $errorUsername; ?>
  <label>Password: </label>
  <input type="password" name="password" value="" />
  <label>Confirm password: </label>
  <input type="password" name="confirmpassword" value=""/>
  <?php echo $errorPassword; ?>
  <input class="inputbutton" type="submit" name="register" value="Register"/>
</form>
<p class="error"><?php echo $error; ?></p>
<a class="button" href="index.php">Login</a>
<?php
include('inlcudes/htmlTail.php');
?>