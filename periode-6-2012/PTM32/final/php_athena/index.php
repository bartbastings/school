<?php
require('includes/connect.php');

header('Content-type: text/json');
header('Content-type: application/json');
header('Acces-Control-Allow-Origin: *');

$type = $_GET['get'];

$tableEvent = mysql_query("SELECT * FROM  tbl_event") or die(mysql_error('cannot select table tbl_event'));
$eventsArray = array('events'=>array());

while($info = mysql_fetch_array($tableEvent)){
	$eventName = $info['event_name'];
	$eventVisitors = $info['event_bezoekers'];
	$musicGenre = $info['event_muziek'];
	$eventsArrayRow = array(
	"eventName"=>$eventName,
	"eventVisitors"=>$eventVisitors,
	"musicGenre"=>$musicGenre
	);
	array_push($eventsArray['events'],$eventsArrayRow);
}

$jsonEventsArray = json_encode($eventsArray);

if($type == 'event'){
	echo $jsonEventsArray;
	exit();	
}
?>
