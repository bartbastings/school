<?php
include('functions/PPMCamera.php');

$hourSound = '744 hour';
//$hourPPM = '1 hour';

// time interval \\
$timeStartCount = date("y-m-d 07:00:00",time());

function PPMCameraTimeInterval($timeStart){
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

$hourPPM = PPMCameraTimeInterval($timeStartCount);

// PPM Camera -> People count
function totalPeoplCamera($in, $out){
	$sum = $in-$out;
	return $sum;
};

function totalPeople($one,$two,$three,$four,$five){
	$totalPeople = ($one+$two+$three+$four+$five);
	return $totalPeople;
};

//camera 1
$PPMCameraOneIn = PPMCameraValue("PPMCameraOneIn",$hourPPM);
$PPMCameraOneOut = PPMCameraValue("PPMCameraOneOut",$hourPPM);

$PPMCameraOneTotal = totalPeoplCamera($PPMCameraOneIn, $PPMCameraOneOut);

//camera 2
$PPMCameraTwoIn = PPMCameraValue("PPMCameraTwoIn",$hourPPM);
$PPMCameraTwoOut = PPMCameraValue("PPMCameraTwoOut",$hourPPM);

$PPMCameraTwoTotal = totalPeoplCamera($PPMCameraTwoIn, $PPMCameraTwoOut);

//camera 3
$PPMCameraThreeIn = PPMCameraValue("PPMCameraThreeIn",$hourPPM);
$PPMCameraThreeOut = PPMCameraValue("PPMCameraThreeOut",$hourPPM);

$PPMCameraThreeTotal = totalPeoplCamera($PPMCameraThreeIn, $PPMCameraThreeOut);

//camera 4
$PPMCameraFourIn = PPMCameraValue("PPMCameraFourIn",$hourPPM);
$PPMCameraFourOut = PPMCameraValue("PPMCameraFourOut",$hourPPM);

$PPMCameraFourTotal = totalPeoplCamera($PPMCameraFourIn, $PPMCameraFourOut);

//camera 5
$PPMCameraFiveIn = PPMCameraValue("PPMCameraFiveIn",$hourPPM);
$PPMCameraFiveOut = PPMCameraValue("PPMCameraFiveOut",$hourPPM);

$PPMCameraFiveTotal = totalPeoplCamera($PPMCameraFiveIn, $PPMCameraFiveOut);

//camera total
$PPMCameraTotal = totalPeople($PPMCameraOneTotal,$PPMCameraTwoTotal,$PPMCameraThreeTotal,$PPMCameraFourTotal,$PPMCameraFiveTotal);
$peopleCount = totalPeople($PPMCameraOneIn,$PPMCameraTwoIn,$PPMCameraThreeIn,$PPMCameraFourIn,$PPMCameraFiveIn);

?>