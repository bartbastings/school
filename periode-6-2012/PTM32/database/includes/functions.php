<?php
	// array table naam
	$arrayTableNames = array("Beer", "CarParkTotalAvailable", "Crime Level 1", "Crime Level 2", "Crime Level 3", "DensityCameraFive", "DensityCameraFour", "DensityCameraOne", "DensityCameraThree", "DensityCameraTwo", "Garbage", "Glass", "LightState", "PPMCameraFiveIn", "PPMCameraFiveOut", "PPMCameraFourIn", "PPMCameraFourOut", "PPMCameraOneIn", "PPMCameraOneOut", "PPMCameraThreeIn", "PPMCameraThreeOut", "PPMCameraTwoIn", "PPMCameraTwoOut", "Rainfall", "SocialMediaActivity", "Sound Level Average", "Sound Level Behind Street Average", "SoundLevelFiveBehindStreet", "Sound Level Highest", "SoundLevelOneBehindStreet", "SoundLevelOneOnStreet", "Sound Level On Street Average", "SoundLevelSixBehindStreet", "SoundLevelThreeBehindStreet", "SoundLevelThreeOnStreet", "SoundLevelTwoBehindStreet", "SoundLevelTwoOnStreet", "Temperature", "Wind Direction", "Wind Speed");
	
	// array table hour
	$length = 48;
	$arrayHour = array();
	for ($i = 1; $i <= $length; $i++) {
		$arrayHour[]="$i hour";
	}
	
	$selectHourOption = $_POST['hourOption'];
	$selectTableOption = $_POST['tableOption'];
    
?>