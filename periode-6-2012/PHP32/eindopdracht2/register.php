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
if (!empty($_POST['registerSubmit'])) {
	
	// validation is false
	$issetRegisterFirstName = false;
	$issetRegisterSurName = false;
	$issetRegisterEmail = false;
	$issetRegisterPassword = false;
	$issetRegisterConfirmPassword = false;
	
	// control first name input field if its not empty
	if(!empty($_POST['firstName'])){
		
		// secure input fist name
		$registerFirstName = secureInput($_POST['firstName']);
		
		// start session first name
		$_SESSION['firstName'] = $registerFirstName;
		
		// validate fist name
		if(validateName($registerFirstName) == true){
			// first name validation is true
			$issetRegisterFirstName = true;
			
			//  refresh session first name
			$_SESSION['firstName'] = $registerFirstName;
			
			// first name error null
			$registerErrorFirstName = NULL;
		}
		else{
			$registerErrorFirstName = "Firstname is not valid.";
		}
	}
	else{
		$registerErrorFirstName = "This field is required.";
	}
	
	// control surname input field if its not empty
	if(!empty($_POST['surName'])){
		
		// secure input surname
		$registerSurName = secureInput($_POST['surName']);
		
		// start session surname
		$_SESSION['surName'] = $registerSurName;
		
		// validate surname
		if(validateName($registerSurName) == true){
			// surname validation is true
			$issetRegisterSurName = true;
			
			//  refresh session surname
			$_SESSION['surName'] = $registerSurName;
			
			// surname error null
			$registerErrorSurName = NULL;
		}
		else{
			$registerErrorSurName = "Surname is not valid.";
		}
	}
	else{
		$registerErrorSurName = "This field is required.";
	}
	
	// control email input field if its not empty
	if(!empty($_POST['email'])){
		
		// secure input emial
		$registerEmail = secureInput($_POST['email']);
		
		// start session email
		$_SESSION['email'] = $registerEmail;
		
		// control if its a valid email
		if(validateEmail($registerEmail) == true){
			
			// refresh sesion email
			$_SESSION['email'] = $registerEmail;
			
			// control email if it exist in database
			if(controlDatabase('users', 'email', $registerEmail) == false){
				
				// email validation is true
				$issetRegisterEmail = true;
				
				// refresh session email
				$_SESSION['email'] = $registerEmail;
				
				// login email error null
				$registerErrorEmail = NULL;
			}
			else{
				$registerErrorEmail = "The email you enterd does already exist in database.";
			}
		}
		else{
			$registerErrorEmail = "It's not a correct email address.";
		}
	}
	else{
		$registerErrorEmail = "This field is required.";
	}
	
	// control password input field if its not empty
	if(!empty($_POST['password'])){
		
		// secure input password
		$registerPassword = secureInput($_POST['password']);
		
		// password validation is true
		$issetRegisterPassword = true;
		
		// login password error null
		$registerErrorPassword = NULL;
	}
	else{
		$registerErrorPassword = "This field is required.";
	}
	
	// control confirm password input field if its not empty
	if(!empty($_POST['confirmPassword'])){
		
		// secure input password
		$registerConfirmPassword = secureInput($_POST['confirmPassword']);
		
		// control if confirmpassword is the same as password
		if(confirmPassword($registerPassword, $registerConfirmPassword) == true){
			// password validation is true
			$issetRegisterConfirmPassword = true;
			
			// login password error null
			$registerErrorConfirmPassword = NULL;
		}
		else{
			$registerErrorConfirmPassword = "The confirm password and password is not the same.";
		}
	}
	else{
		$registerErrorConfirmPassword = "This field is required.";
	}
	
	// if validation is true
	if($issetRegisterFirstName == true && $issetRegisterSurName == true && $issetRegisterEmail == true && $issetRegisterPassword == true && $issetRegisterConfirmPassword == true){
		// encrypt password
		$registerPasswordEncrypt = passwordBLowfishCrypt($registerPassword);
		
		// register query
		$registerQuery = "INSERT INTO users (firstName, surName, email, password) VALUES ('$registerFirstName','$registerSurName','$registerEmail','$registerPasswordEncrypt')";
		
		// if mysql query succeed
		if(mysql_query($registerQuery)){
			
			// destroy session
			session_destroy();
			
			// change pagee tot inlog.php
			header('Location: login.php');
			
			// exit page
			exit;
		}
		else{
			$registerErrorQuery = "Error: ".mysql_error();
		}
	}
};
?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="css/style.css"/>
<title>Register</title>
</head>

<body>
<div class="wrapper">
  <header class="registerHeader">
    <h2>Register fanpage studio ghibli</h2>
  </header>
  <section class="registerSection">
    <form method="post">
      <label>First name: </label>
      <input type="text" name="firstName" value="<?php echo $_SESSION['firstName'] ?>" />
      <span class="error"><?php echo $registerErrorFirstName ?></span>
      <label>Surname: </label>
      <input type="text" name="surName" value="<?php echo $_SESSION['surName'] ?>" />
      <span class="error"><?php echo $registerErrorSurName ?></span>
      <label>Email: </label>
      <input type="email" name="email" value="<?php echo $_SESSION['email'] ?>"/>
      <span class="error"><?php echo $registerErrorEmail ?></span>
      <label>Password: </label>
      <input type="password" name="password"/>
      <span class="error"><?php echo $registerErrorPassword ?></span>
      <label>Confirm password: </label>
      <input type="password" name="confirmPassword"/>
      <span class="error"><?php echo $registerErrorConfirmPassword ?></span>
      <input class="sumbitButton" type="submit" name="registerSubmit" value="Register"/>
      <span class="error"><?php echo $registerErrorQuery ?></span>
    </form>
    <a class="button" href="login.php">Go back</a>
    </section>
  <footer> </footer>
</div>
</body>
</html>