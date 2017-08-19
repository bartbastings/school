<?php
function sortFunction( $a, $b ) {
	return strtotime($a["date"]) - strtotime($b["date"]);
}
		
function PPMCameraValue($PPMCamera,$hour){
	$query = "SELECT * FROM stratumseind_data WHERE name='".$PPMCamera."' AND timestamp > (now() - interval '".$hour."')";		
	$result = pg_query($query) or die('Query failed: ' . pg_last_error());
	
	$PPMCameraArray = array();
	if ($result) {
		for ($row = 0; $row < pg_numrows($result); $row++) {
			$values = pg_fetch_row($result, $row);
			$PPMCameraArray[] = array("date"=>$values[1],"value"=>$values[2]);
		}
		
		usort($PPMCameraArray, "sortFunction");
		
		$PPMCameraCount = count($PPMCameraArray);
		$PPMCameraValueArray = array();
		
		for($row = 0; $row < $PPMCameraCount; $row++){
			$min = (strtotime($PPMCameraArray[$row+1]["date"])-strtotime($PPMCameraArray[$row]["date"]))/60;
			$val = $PPMCameraArray[$row+1]["value"]*$min;
			$PPMCameraValueArray[] = $val;
		}
		$PPMCameraReturnValue = array_sum($PPMCameraValueArray);
		return round($PPMCameraReturnValue);
	}
	else {
		return "The query failed with the following error: ".pg_errormessage($db_handle);
	}
}
?>