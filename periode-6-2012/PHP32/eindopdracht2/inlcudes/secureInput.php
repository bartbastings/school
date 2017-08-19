<?php
function secureInput($input){
	$input = strip_tags($input);
	$input = htmlentities($input); 
	$input = mysql_real_escape_string($input);
	return $input;
}
?>