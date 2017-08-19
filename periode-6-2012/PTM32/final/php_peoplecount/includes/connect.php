<?php
$host="host=88.159.19.5";
$port="port=5432";
$username="user=stratumseind";
$password="password=Stratums3inD";
$dbName="dbname=datalogger";

pg_connect("$host $port $dbName $username $password") or die ('Cannot connect'. pg_last_error());

?>