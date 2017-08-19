<?php
function timeInterval($timeStart){
	$timeNow = date("y-m-d G:i:s",time());	
	if($timeNow > $timeStart){
		$timeDifference = strtotime($timeNow) - strtotime($timeStart);
		$hour = floor($timeDifference/3600);
		return $hour.' hour';
	}
	else{
		$timeStartBack = strtotime(date("y-m-d G:i:s", strtotime($timeStart))." -1 day");
		$yesterdaytimeStart = date('y-m-d G:i:s', $timeStartBack);
		$timeDifference = strtotime($timeNow) - strtotime($yesterdaytimeStart);
		$hour = floor($timeDifference/3600);
		return $hour.' hour';
	}
};
?>