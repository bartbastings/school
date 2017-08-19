<?php
include('inlcudes/htmlHead.php');
include('inlcudes/connect.php');

// values json datavisual
$jsonQuery="SELECT data_id, column1, column2, column3, column4 FROM data_visual WHERE data_id='$json'";
$jsonData = mysql_query($jsonQuery) or die(mysql_error());
$jsonArray = mysql_fetch_array($jsonData);
	
$tableName = $jsonArray['data_id'];

echo $jsonArray['column1'];

$jsonColumn1 = $jsonArray['column1'];
$jsonColumn2 = $jsonArray['column2'];
$jsonColumn3 = $jsonArray['column3'];
$jsonColumn4 = $jsonArray['column4'];

// values xml datavisual	
$xmlQuery = "SELECT data_id, column1, column2, column3, column4 FROM data_visual WHERE data_id='$xml'";
$xmlData = mysql_query($xmlQuery) or die(mysql_error());
$xmlArray = mysql_fetch_array($xmlData);

$xmlColumn1 = $xmlArray['column1'];
$xmlColumn2 = $xmlArray['column2'];
$xmlColumn3 = $xmlArray['column3'];
$xmlColumn4 = $xmlArray['column4'];

$userQuery = "SELECT * FROM users";
$userData = mysql_query($userQuery) or die(mysql_error());

while($user = mysql_fetch_array($userData)){
	echo $user['name'].' '.$user['surname'].'</br>';
}

?>

<h1>Weclome Admin</h1>
<div class="">
<h2>Users</h2>
<p>list users</p>

<h2>json datavisual</h2>
<form>
<label>Column1</label>
<input type="text" name="jsonColumn1" value="<?php echo $jsonColumn1; ?>">
<label>Column2</label>
<input type="text" name="jsonColumn2" value="<?php echo $jsonColumn2; ?>">
<label>Column3</label>
<input type="text" name="jsonColumn3" value="<?php echo $jsonColumn3; ?>">
<label>Column4</label>
<input type="text" name="jsonColumn4" value="<?php echo $jsonColumn4; ?>">
</form>

<h2>xml datavisual</h2>
<form>
<label>Column1</label>
<input type="text" name="xmlColumn1" value="<?php echo $xmlColumn1; ?>">
<label>Column2</label>
<input type="text" name="xmlColumn2" value="<?php echo $xmlColumn2; ?>">
<label>Column3</label>
<input type="text" name="xmlColumn3" value="<?php echo $xmlColumn3; ?>">
<label>Column4</label>
<input type="text" name="xmlColumn4" value="<?php echo $xmlColumn4; ?>">
</form>
<?php
mysql_close();

include('inlcudes/htmlTail.php');
?>