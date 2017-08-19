<?php
//ORGINEEL
session_start();
session_destroy();
if (isset($_POST["verderWinkelen"]))
{

    header("Location: webwinkel.php");
    exit();
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bestelling</title>
</head>
<body>
<h1>Bedankt voor uw bestelling.</h1>

<form action="" method= post>
    <input type="submit" value="Verder winkelen" name ="verderWinkelen"/> 
</form>
   
</body>
</html>
