<?php
function controlDatabase($dbTable, $columnName ,$searchName){
	$controlQuery = "SELECT * FROM ".$dbTable." WHERE ".$columnName." LIKE '".$searchName."'";
	$controlResult = mysql_query($controlQuery);
	if(mysql_num_rows($controlResult) > 0){
		return true;
	}
	else{
		return false;
	}
}

function getPassword($dbTable, $columnName, $searchName){
	$getPasswordQuery="SELECT * FROM ".$dbTable." WHERE ".$columnName."='$searchName'";
	$getPasswordResult = mysql_query($getPasswordQuery);
	$getPasswordRecord = mysql_fetch_assoc($getPasswordResult);
	
	return $getPasswordRecord['password']; 
}

function getUserData($dbTable, $email, $password){
	$getUserDataQuery="SELECT * FROM ".$dbTable." WHERE email='$email' AND password='$password'";
	$getUserDataResult = mysql_query($getUserDataQuery);
	$getUserDataRecord = mysql_fetch_assoc($getUserDataResult);
	
	$userData = array(
		"userId" => $getUserDataRecord['userid'],
		"firstName" => $getUserDataRecord['firstName'],
		"surName" => $getUserDataRecord['surName'],
		"email" => $getUserDataRecord['email']
	);
	
	return $userData;
}

?>