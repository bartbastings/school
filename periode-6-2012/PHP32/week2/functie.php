<?php

function mailOK($email){
	$blacklist = array('to','cc','bcc');
	foreach($blacklist as $item)
	if(stripos($email, $item))
		$email="";
}

?>