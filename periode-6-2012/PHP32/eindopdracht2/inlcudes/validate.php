<?php
function validateEmail($email){
	if(preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/',$email)){
		return true;
	}
	else{
		return false;
	}
}

function validateName($name){
	if(preg_match('/^[a-zA-z]{0,255}$/',$name)){
		return true;
	}
	else{
		return false;
	}
}

function validateSearchName($name){
	if(preg_match('/^[a-zA-Z ]+$/',$name)){
		return true;
	}
	else{
		return false;
	}
}

function confirmPassword($password, $confirmPassword){
	if($password == $confirmPassword){
		return true;
	}
	else{
		return false;
	}
}
?>