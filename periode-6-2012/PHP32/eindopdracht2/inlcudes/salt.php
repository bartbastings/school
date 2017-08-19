<?php
function passwordPbkdf2Crypt($password){
	$salt = hash('sha256',$password);
	$iterations = 1000;
	$hash = hash_pbkdf2("sha512", $password, $salt, $iterations, 20);
	return $hash;
}

function passwordBLowfishCrypt($password){
	$salt = hash('sha256',$password);
	$hash = crypt('something','$2a$09$'.$salt.'$');
	return $hash;
}
?>