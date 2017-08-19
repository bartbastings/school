<?php

// $query = "SELECT * FROM stratumseind_data WHERE name='".$PPMCamera."' AND timestamp BETWEEN TIMESTAMP '2013-12-24 13:00:00' AND TIMESTAMP '2013-12-24 14:00:00'"
// $query = "SELECT * FROM stratumseind_data WHERE name='".$PPMCamera."' AND timestamp BETWEEN TIMESTAMP '".$time1."' AND TIMESTAMP '".$time2."'"


function PPMCameraValue($PPMCamera,$hour){
	$query = "SELECT * FROM stratumseind_data WHERE name='".$PPMCamera."' AND timestamp > (now() - interval '".$hour."')";		
	$result = pg_query($query) or die('Query failed: ' . pg_last_error());
	$PPMCameraArray = array();
	if ($result) {
		for ($row = 0; $row < pg_numrows($result); $row++) {
			$values = pg_fetch_row($result, $row);
			$PPMCameraArray[]=$values[2];
		}
		$PPMCameraSum = array_sum($PPMCameraArray);
		return $PPMCameraSum;
	}
	else {
		return "The query failed with the following error: ".pg_errormessage($db_handle);
	}
}

function PPMCameraCount($PPMCamera,$hour){
	$query = "SELECT * FROM stratumseind_data WHERE name='".$PPMCamera."' AND timestamp > (now() - interval '".$hour."')";		
	$result = pg_query($query) or die('Query failed: ' . pg_last_error());
	$PPMCameraArray = array();
	if ($result) {
		for ($row = 0; $row < pg_numrows($result); $row++) {
			$values = pg_fetch_row($result, $row);
			$PPMCameraArray[]=$values[2];
		}
		$PPMCameraCount = count($PPMCameraArray);
		return $PPMCameraCount;
	}
	else {
		return "The query failed with the following error: ".pg_errormessage($db_handle);
	}
}
￼

/*
class PPMCamera{
	
	private $PPMCameraSum;
	
	public function __construct($PPMCamera,$hour){
		
		$query = "SELECT * FROM stratumseind_data WHERE name='".$PPMCamera."' AND timestamp > (now()-interval'".$hour."')";		
		$result = pg_query($query) or die('Query failed: ' . pg_last_error());
		$PPMCameraArray = array();
		
		if ($result) {
			for ($row = 0; $row < pg_numrows($result); $row++) {
				$values = pg_fetch_row($result, $row);
				$PPMCameraArray[]=$values[2];
			}
			$this->PPMCameraSum = array_sum($PPMCameraArray);
		}
		else {
			return "The query failed with the following error: ".pg_errormessage($db_handle);
		}
	}
	public function getPPMCamera()
    {
        return $this->PPMCameraSum;
    }
}
*/
?>