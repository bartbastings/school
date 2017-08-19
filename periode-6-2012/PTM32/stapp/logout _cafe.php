<?php 
session_start();
session_destroy();

header("Location:inloggen_cafe.php");
?>