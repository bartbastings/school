<?php
include('functions/PPMCamera.php');
include('functions/timeInterval.php');

function totalPeopleOneCamera($in, $out){
	$sum = $in-$out;
	return $sum;
};

function totalPeople($one,$two,$three,$four,$five){
	$totalPeople = ($one+$two+$three+$four+$five);
	return $totalPeople;
};

$timeStartCount = date("y-m-d 07:00:00",time());

$hourPPM = timeInterval($timeStartCount);


//camera 1
$PPMCameraOneIn = PPMCameraValue("PPMCameraOneIn",$hourPPM);
$PPMCameraOneOut = PPMCameraValue("PPMCameraOneOut",$hourPPM);

$PPMCameraOneTotal = totalPeopleOneCamera($PPMCameraOneIn, $PPMCameraOneOut);

//camera 2
$PPMCameraTwoIn = PPMCameraValue("PPMCameraTwoIn",$hourPPM);
$PPMCameraTwoOut = PPMCameraValue("PPMCameraTwoOut",$hourPPM);

$PPMCameraTwoTotal = totalPeopleOneCamera($PPMCameraTwoIn, $PPMCameraTwoOut);

//camera 3
$PPMCameraThreeIn = PPMCameraValue("PPMCameraThreeIn",$hourPPM);
$PPMCameraThreeOut = PPMCameraValue("PPMCameraThreeOut",$hourPPM);

$PPMCameraThreeTotal = totalPeopleOneCamera($PPMCameraThreeIn, $PPMCameraThreeOut);

//camera 4
$PPMCameraFourIn = PPMCameraValue("PPMCameraFourIn",$hourPPM);
$PPMCameraFourOut = PPMCameraValue("PPMCameraFourOut",$hourPPM);

$PPMCameraFourTotal = totalPeopleOneCamera($PPMCameraFourIn, $PPMCameraFourOut);

//camera 5
$PPMCameraFiveIn = PPMCameraValue("PPMCameraFiveIn",$hourPPM);
$PPMCameraFiveOut = PPMCameraValue("PPMCameraFiveOut",$hourPPM);

$PPMCameraFiveTotal = totalPeopleOneCamera($PPMCameraFiveIn, $PPMCameraFiveOut);

//total
$PPMCameraTotal = totalPeople($PPMCameraOneTotal,$PPMCameraTwoTotal,$PPMCameraThreeTotal,$PPMCameraFourTotal,$PPMCameraFiveTotal);

?>