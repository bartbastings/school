<?php

session_start();

if(isset($_SESSION['sid'])){
	$_SESSION['teller']++;
	echo 'Controle: '.$_SESSION['teller'].'<br/>';
}
else{
	$_SESSION['sid'] = session_id();
	$_SESSION['teller'] = 0;
}

echo $_SESSION['sid'];

?>