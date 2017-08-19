<?php
include('includes/connect.php');
include('includes/functions.php');

header('Content-type: text/json');
header('Content-type: application/json');
header('Acces-Control-Allow-Origin: *');

$type = $_GET['get'];

$json = json_encode(array('people count'=>$PPMCameraTotal));

if($type == 'peoplecount'){
	echo $json;
	exit();	
}

echo $PPMCameraTotal;
?>