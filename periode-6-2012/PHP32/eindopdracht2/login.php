<?php
// connect to database \\
include('inlcudes/connect.php');
// secure input \\
include('inlcudes/secureInput.php');
// password encryption \\
include('inlcudes/salt.php');
// validate functions \\
include('inlcudes/validate.php');
// database querys \\
include('inlcudes/query.php');

session_start();
// form validation
if (!empty($_POST['loginSubmit'])) {
	
	// validation is false
	$issetLoginEmail = false;
	$issetLoginPassword = false;
	
	// control email input field if its not empty
	if(!empty($_POST['email'])){
		
		// secure input emial
		$loginEmail = secureInput($_POST['email']);
		
		// start session email
		$_SESSION['email'] = $loginEmail;
		
		// control if its a valid email
		if(validateEmail($loginEmail) == true){
			
			// refresh sesion email
			$_SESSION['email'] = $loginEmail;
			
			// control email if it exist in database
			if(controlDatabase('users', 'email', $loginEmail) == true){
				
				// email validation is true
				$issetLoginEmail = true;
				
				// refresh session email
				$_SESSION['email'] = $loginEmail;
				
				// login email error null
				$loginErrorEmail = NULL;
			}
			else{
				$loginErrorEmail = "The email you enterd doesn't exist in database.";
			}
		}
		else{
			$loginErrorEmail = "It's not a correct email address";
		}
	}
	else{
		$loginErrorEmail = "This field is required.";
	}
	
	// control password input field if its not empty
	if(!empty($_POST['password'])){
		
		// secure input password
		$loginPassword = secureInput($_POST['password']);
		
		// password validation is true
		$issetLoginPassword = true;
		
		// login password error null
		$loginErrorPassword = NULL;
	}
	else{
		$loginErrorPassword = "This field is required.";
	}
	
	// control if validte is complete
	if($issetLoginPassword == true && $issetLoginEmail == true){
		// encrypt password
		$loginPasswordEncrypt = passwordBLowfishCrypt($loginPassword);
		// get password from database
		$dbPassword = getPassword('users', 'email', $loginEmail);
		
		// control if it's te correct password
		if(confirmPassword($loginPasswordEncrypt, $dbPassword) == true){
			
			// get user data from database
			$userData = getUserData('users', $loginEmail, $loginPasswordEncrypt);
			
			// set error null
			$loginErrorPassword = NULL;
			
			// session with data from user 
			$_SESSION['userId'] = $userData['userId'];
			$_SESSION['firstName'] = $userData['firstName'];
			$_SESSION['surName'] = $userData['surName'];
			$_SESSION['email'] = $userData['email'];
			
			// change page to welcome.php
			header('Location: index.php');
			
			// exit page
			exit;
		}
		else{
			$loginErrorPassword = "The password you entered is incorrect.";
		}
	}		
};
?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="css/style.css"/>
<title>Login</title>
</head>

<body>
	<div class="wrapper">
  <header class="inlogHeader">
    <h2>Login fanpage studio ghibli</h2>
  </header>
  <section class="inlogSection">
    <form method="post">
      <label>Email: </label>
      <input type="email" name="email" value="<?php echo $_SESSION['email']; ?>" />
      <span class="error"><?php echo $loginErrorEmail ?></span>
      <label>Password: </label>
      <input type="password" name="password"/>
      <span class="error"><?php echo $loginErrorPassword ?></span>
      <input class="submitButton" type="submit" name="loginSubmit" value="Login"/>
    </form>
    <a class="button" href="register.php">Register</a>
  </section>
  <footer>
  </footer>
</div>
</body>
</html>