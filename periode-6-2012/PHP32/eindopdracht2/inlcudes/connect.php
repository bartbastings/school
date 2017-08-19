<?php
$host="localhost";
$username="root";
$password="root";
$databaseName="finalphp";

mysql_connect("$host","$username","$password") or die ($error="cannot connect database: ".mysqli_connect_error());
$database = mysql_select_db("$databaseName")or die($error="cannot select database: ".mysqli_connect_errno());
?>