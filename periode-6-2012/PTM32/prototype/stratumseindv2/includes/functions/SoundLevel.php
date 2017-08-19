<?php
function SoundLevelValue($Soundlevel,$hour){
	$query = "SELECT * FROM stratumseind_data WHERE name='".$Soundlevel."' AND timestamp > (now() - interval '".$hour."')";		
	$result = pg_query($query) or die('Query failed: ' . pg_last_error());
	$SoundLevelArray = array();
	if ($result) {
		for ($row = 0; $row < pg_numrows($result); $row++) {
			$values = pg_fetch_row($result, $row);
			$SoundLevelArray[]=$values[2];
		}
		$SoundlevelValue = $SoundLevelArray[0];
		if($SoundlevelValue == NULL){
			return 'no value';
		}
		else{
			return $SoundlevelValue;
		}
	}
	else {
		return "The query failed with the following error: ".pg_errormessage($db_handle);
	}
}

function SoundLevelDate($Soundlevel,$hour){
	$query = "SELECT * FROM stratumseind_data WHERE name='".$Soundlevel."' AND timestamp > (now() - interval '".$hour."')";		
	$result = pg_query($query) or die('Query failed: ' . pg_last_error());
	$SoundLevelArray = array();
	if ($result) {
		for ($row = 0; $row < pg_numrows($result); $row++) {
			$values = pg_fetch_row($result, $row);
			$SoundLevelArray[]=$values[1];
		}
		$SoundlevelFirstDate = $SoundLevelArray[0];
		if($SoundlevelFirstDate == NULL){
			return 'no value';
		}
		else{
			$SoundlevelFirstDate = date("d-m-Y G:i:s", strtotime($SoundlevelFirstDate));
			return $SoundlevelFirstDate;
		}
		
	}
	else {
		return "The query failed with the following error: ".pg_errormessage($db_handle);
	}
}

function SoundLevelCount($Soundlevel,$hour){
	$query = "SELECT * FROM stratumseind_data WHERE name='".$Soundlevel."' AND timestamp > (now() - interval '".$hour."')";		
	$result = pg_query($query) or die('Query failed: ' . pg_last_error());
	$SoundLevelArray = array();
	if ($result) {
		for ($row = 0; $row < pg_numrows($result); $row++) {
			$values = pg_fetch_row($result, $row);
			$SoundLevelArray[]=$values[2];
		}
		$SoundlevelCount= count($SoundLevelArray);
		if($SoundlevelCount == 0){
			return 'no value';
		}
		else{
			return $SoundlevelCount;
		}
	}
	else {
		return "The query failed with the following error: ".pg_errormessage($db_handle);
	}
}