<?php
$host="athena01.fhict.local";
$username="dbi245215";
$password="JhoEPVB4bV";
$db_name="dbi245215";

mysql_connect("$host","$username","$password") or die ('cannot connect');
mysql_select_db("$db_name")or die("cannot select DB");
?>