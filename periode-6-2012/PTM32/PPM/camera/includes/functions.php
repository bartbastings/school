<?php
include('functions/PPMCamera.php');

function totalPeopleOneCamera($in, $out){
	$sum = $in-$out;
	return $sum;
};

function totalPeople($one,$two,$three,$four,$five){
	$totalPeople = ($one+$two+$three+$four+$five);
	return $totalPeople;
};

$hour = '1 hour';

// PPM Camera One
$PPMCameraOneIn = PPMCameraValue('PPMCameraOneIn',$hour);
$PPMCameraOneOut = PPMCameraValue('PPMCameraOneOut',$hour);
$PPMCameraOneInCount = PPMCameraCount('PPMCameraOneIn',$hour);
$PPMCameraOneOutCount = PPMCameraCount('PPMCameraOneOut',$hour);

// PPM Camera Two
$PPMCameraTwoIn = PPMCameraValue('PPMCameraTwoIn',$hour);
$PPMCameraTwoOut = PPMCameraValue('PPMCameraTwoOut',$hour);
$PPMCameraTwoInCount = PPMCameraCount('PPMCameraTwoIn',$hour);
$PPMCameraTwoOutCount = PPMCameraCount('PPMCameraTwoOut',$hour);

// PPM Camera Three
$PPMCameraThreeIn = PPMCameraValue('PPMCameraThreeIn',$hour);
$PPMCameraThreeOut = PPMCameraValue('PPMCameraThreeOut',$hour);
$PPMCameraThreeInCount = PPMCameraCount('PPMCameraThreeIn',$hour);
$PPMCameraThreeOutCount = PPMCameraCount('PPMCameraThreeOut',$hour);

// PPM Camera Four
$PPMCameraFourIn = PPMCameraValue('PPMCameraFourIn',$hour);
$PPMCameraFourOut = PPMCameraValue('PPMCameraFourOut',$hour);
$PPMCameraFourInCount = PPMCameraCount('PPMCameraFourIn',$hour);
$PPMCameraFourOutCount = PPMCameraCount('PPMCameraFourOut',$hour);

// PPM Camera Five
$PPMCameraFiveIn = PPMCameraValue('PPMCameraFiveIn',$hour);
$PPMCameraFiveOut = PPMCameraValue('PPMCameraFiveOut',$hour);
$PPMCameraFiveInCount = PPMCameraCount('PPMCameraFiveIn',$hour);
$PPMCameraFiveOutCount = PPMCameraCount('PPMCameraFiveOut',$hour);

$PPMCameraOneTotal = totalPeopleOneCamera($PPMCameraOneIn,$PPMCameraOneOut);
$PPMCameraTwoTotal = totalPeopleOneCamera($PPMCameraTwoIn,$PPMCameraTwoOut);
$PPMCameraThreeTotal = totalPeopleOneCamera($PPMCameraThreeIn,$PPMCameraThreeOut);
$PPMCameraFourTotal = totalPeopleOneCamera($PPMCameraFourIn,$PPMCameraFourOut);
$PPMCameraFiveTotal = totalPeopleOneCamera($PPMCameraFiveIn,$PPMCameraFiveOut);


?>