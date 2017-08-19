<?php
include('functions/PPMCamera.php');
include('functions/SoundLevel.php');
require_once('lib/facebook.php');
require_once("fbconnect.php");

// Favebook Login \\

$facebook = new Facebook(array(
  'appId'  => $app_id,
  'secret' => $app_secret,
  'fileUpload' => false,
  'allowSignedRequest' => false,
));

$user = $facebook->getUser();

if ($user) {
  try {
    $user_profile = $facebook->api('/me/permissions');
  } catch (FacebookApiException $e) {
    error_log($e);
    $user = null;
  }
}

$params = array('scope' => 'user_birthday, user_hometown',);

if ($user) {
  $logoutUrl = $facebook->getLogoutUrl();
} else {
  $statusUrl = $facebook->getLoginStatusUrl();
  $loginUrl = $facebook->getLoginUrl($params);
}

// facebook information
$firstnameFacebook = $user_profile['first_name'];
$lastnameFacebook = $user_profile['last_name'];
$genderFacebook = $user_profile['gender'];
$birthdayFacebook = $user_profile['birthday'];
$countryFacebook = $user_profile['locale'];
$hometownFacebook = $user_profile['hometown'];

// buttons login and logout
$login_facebook = '<a class="button" href="'.$loginUrl.'">Facebook</a>';
$logout_facebook = '<a class="button" href="'.$logoutUrl.'">Log out</a>';


// time interval \\

$hourSound = '744 hour';
$hourPPM = '1 hour';

// Sound Level \\

// Sound level Average
$SoundLevelAverage = SoundLevelValue('Sound Level Average',$hourSound);
$SoundLevelAverageDate = SoundLevelDate('Sound Level Average',$hourSound);
$SoundLevelAverageCount = SoundLevelCount('Sound Level Average',$hourSound);
// OnStreet
$SoundLevelOnStreetAverage = SoundLevelValue('Sound Level On Street Average',$hourSound);
$SoundLevelOnStreetAverageDate = SoundLevelDate('Sound Level On Street Average',$hourSound);
$SoundLevelOnStreetAverageCount = SoundLevelCount('Sound Level On Street Average',$hourSound);
//BehindStreet
$SoundLevelBehindStreetAverage = SoundLevelValue('Sound Level Behind Street Average',$hourSound);
$SoundLevelBehindStreetAverageDate = SoundLevelDate('Sound Level Behind Street Average',$hourSound);
$SoundLevelBehindStreetAverageCount = SoundLevelCount('Sound Level Behind Street Average',$hourSound);

// Sound Level Highest
$SoundLevelHighest = SoundLevelValue('Sound Level Highest',$hourSound); 
$SoundLevelHighestCount = SoundLevelCount('Sound Level Highest',$hourSound);
//$SoundLevelOnStreetHighest = SoundLevelValue('Sound Level On Street Highest',$hourSound);//*
//$SoundLevelOnStreetHighestCount = SoundLevelCount('Sound Level On Street Highest',$hourSound);//*
//$SoundLevelBehindStreetHighest = SoundLevelValue('Sound Level Behind Street Highest',$hourSound);//*
//$SoundLevelBehindStreetHighestCount = SoundLevelCount('Sound Level Behind Street Highest',$hourSound);//*

// Sound Level One
//$SoundLevelOne = SoundLevelValue('SoundLevelOne',$hourSound);//*
//$SoundLevelOneCount = SoundLevelCount('SoundLevelOne',$hourSound);//*
$SoundLevelOneOnStreet = SoundLevelValue('SoundLevelOneOnStreet',$hourSound);
$SoundLevelOneOnStreetCount = SoundLevelCount('SoundLevelOneOnStreet',$hourSound);
$SoundLevelOneBehindStreet = SoundLevelValue('SoundLevelOneBehindStreet',$hourSound);
$SoundLevelOneBehindStreetCount = SoundLevelCount('SoundLevelOneBehindStreet',$hourSound);

// Sound Level Two
//$SoundLevelTwo = SoundLevelValue('SoundLevelTwo',$hourSound);//*
//$SoundLevelTwoCount = SoundLevelCount('SoundLevelTwo',$hourSound);//*
$SoundLevelTwoOnStreet = SoundLevelValue('SoundLevelTwoOnStreet',$hourSound);
$SoundLevelTwoOnStreetCount = SoundLevelCount('SoundLevelTwoOnStreet',$hourSound);
$SoundLevelTwoBehindStreet = SoundLevelValue('SoundLevelTwoBehindStreet',$hourSound);
$SoundLevelTwoBehindStreetCount = SoundLevelCount('SoundLevelTwoBehindStreett',$hourSound);

// Sound Level Three
//$SoundLevelThree = SoundLevelValue('SoundLevelThree',$hourSound);//*
//$SoundLevelThreeCount = SoundLevelCount('SoundLevelThree',$hourSound);//*
$SoundLevelThreeOnStreet = SoundLevelValue('SoundLevelThreeOnStreet',$hourSound);
$SoundLevelThreeOnStreetCount = SoundLevelCount('SoundLevelThreeOnStreet',$hourSound);
$SoundLevelThreeBehindStreet = SoundLevelValue('SoundLevelThreeBehindStreet',$hourSound);
$SoundLevelThreeBehindStreetCount = SoundLevelCount('SoundLevelThreeBehindStreett',$hourSound);

// Sound Level Four
//$SoundLevelFour = SoundLevelValue('SoundLevelFour',$hourSound);//*
//$SoundLevelFourCount = SoundLevelCount('SoundLevelFour',$hourSound);//*
//$SoundLevelFourOnStreet = SoundLevelValue('SoundLevelFourOnStreet',$hourSound);//*
//$SoundLevelFourOnStreetCount = SoundLevelCount('SoundLevelFourOnStreet',$hourSound);//*
//$SoundLevelFourBehindStreet = SoundLevelValue('SoundLevelFourBehindStreet',$hourSound);//*
//$SoundLevelFourBehindStreetCount = SoundLevelCount('SoundLevelFourBehindStreett',$hourSound);//*

// Sound Level Five
//$SoundLevelFive = SoundLevelValue('SoundLevelFive',$hourSound);//*
//$SoundLevelFiveCount = SoundLevelCount('SoundLevelFive',$hourSound);//*
//$SoundLevelFiveOnStreet = SoundLevelValue('SoundLevelFiveOnStreet',$hourSound);//*
//$SoundLevelFiveOnStreetCount = SoundLevelCount('SoundLevelFiveOnStreet',$hourSound);//*
$SoundLevelFiveBehindStreet = SoundLevelValue('SoundLevelFiveBehindStreet',$hourSound);
$SoundLevelFiveBehindStreetCount = SoundLevelCount('SoundLevelFiveBehindStreett',$hourSound);

// Sound Level Six
//$SoundLevelSix = SoundLevelValue('SoundLevelSix',$hourSound);//*
//$SoundLevelSixCount = SoundLevelCount('SoundLevelSix',$hourSound);//*
//$SoundLevelSixOnStreet = SoundLevelValue('SoundLevelSixOnStreet',$hourSound);//*
//$SoundLevelSixOnStreetCount = SoundLevelCount('SoundLevelSixOnStreet',$hourSound);//*
$SoundLevelSixBehindStreet = SoundLevelValue('SoundLevelSixBehindStreet',$hourSound);
$SoundLevelSixBehindStreetCount = SoundLevelCount('SoundLevelSixBehindStreett',$hourSound);


// PPM Camera -> People count
function totalPeopleOneCamera($in, $out){
	$sum = $in-$out;
	return $sum;
};

function totalPeople($one,$two,$three,$four,$five){
	$totalPeople = ($one+$two+$three+$four+$five);
	return $totalPeople;
};

$PPMCameraOneInSort = PPMCameraDateSort('PPMCameraOneIn',$hourPPM);

// PPM Camera One
$PPMCameraOneIn = PPMCameraValue('PPMCameraOneIn',$hourPPM);
$PPMCameraOneOut = PPMCameraValue('PPMCameraOneOut',$hourPPM);
$PPMCameraOneInCount = PPMCameraCount('PPMCameraOneIn',$hourPPM);
$PPMCameraOneOutCount = PPMCameraCount('PPMCameraOneOut',$hourPPM);

// PPM Camera Two
$PPMCameraTwoIn = PPMCameraValue('PPMCameraTwoIn',$hourPPM);
$PPMCameraTwoOut = PPMCameraValue('PPMCameraTwoOut',$hourPPM);
$PPMCameraTwoInCount = PPMCameraCount('PPMCameraTwoIn',$hourPPM);
$PPMCameraTwoOutCount = PPMCameraCount('PPMCameraTwoOut',$hourPPM);

// PPM Camera Three
$PPMCameraThreeIn = PPMCameraValue('PPMCameraThreeIn',$hourPPM);
$PPMCameraThreeOut = PPMCameraValue('PPMCameraThreeOut',$hourPPM);
$PPMCameraThreeInCount = PPMCameraCount('PPMCameraThreeIn',$hourPPM);
$PPMCameraThreeOutCount = PPMCameraCount('PPMCameraThreeOut',$hourPPM);

// PPM Camera Four
$PPMCameraFourIn = PPMCameraValue('PPMCameraFourIn',$hourPPM);
$PPMCameraFourOut = PPMCameraValue('PPMCameraFourOut',$hourPPM);
$PPMCameraFourInCount = PPMCameraCount('PPMCameraFourIn',$hourPPM);
$PPMCameraFourOutCount = PPMCameraCount('PPMCameraFourOut',$hourPPM);

// PPM Camera Five
$PPMCameraFiveIn = PPMCameraValue('PPMCameraFiveIn',$hourPPM);
$PPMCameraFiveOut = PPMCameraValue('PPMCameraFiveOut',$hourPPM);
$PPMCameraFiveInCount = PPMCameraCount('PPMCameraFiveIn',$hourPPM);
$PPMCameraFiveOutCount = PPMCameraCount('PPMCameraFiveOut',$hourPPM);

$PPMCameraOneTotal = totalPeopleOneCamera($PPMCameraOneIn,$PPMCameraOneOut);
$PPMCameraTwoTotal = totalPeopleOneCamera($PPMCameraTwoIn,$PPMCameraTwoOut);
$PPMCameraThreeTotal = totalPeopleOneCamera($PPMCameraThreeIn,$PPMCameraThreeOut);
$PPMCameraFourTotal = totalPeopleOneCamera($PPMCameraFourIn,$PPMCameraFourOut);
$PPMCameraFiveTotal = totalPeopleOneCamera($PPMCameraFiveIn,$PPMCameraFiveOut);


?>