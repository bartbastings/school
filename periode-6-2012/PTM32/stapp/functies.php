
<?php
//voor pagina inloggen

function veilig($value){
 return mysql_real_escape_string($value);
 return htmlspecialchars($value, ENT_NOQUOTES, ENT_QUOTES);
 return trim($value);
}


function mailOk($email){

if(filter_var($email, FILTER_VALIDATE_EMAIL)){
	return $email;
}
else{

	
	return 'invalid email !';

}

}






 
	
	


function validate_email($email){
//$regex = "/([\w\-]+\@[\w\-]+\.[\w\-]+)/";

if (!preg_match('/^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/', $email)) {
    
	 return false;
} else { 
       return true;
} 

}


function validate_wachtwoord ($wachtwoord1){

if (!preg_match('/^[0-9A-Za-z]{8,12}$/', $wachtwoord1)) {
    
	 return false;
} else { 
       return true;
} 

}

?>








