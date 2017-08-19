<?php

$json = 'acteurs.json';

var_dump(json_decode($json));
var_dump(json_decode($json, true));

// twee normale arrays
$arr1 = array('boter', 'kaas', 'eieren', 'bloem', 'melk');
$arr2 = array('tomaat', 'gehakt', 'selderij', 'wortel');

// een meerdimensionale en associatieve array
$ingredienten = array("pannekoeken" => $arr1, "bolognese" => $arr2);

// demo encoding:
echo "Eenvoudige array: ", json_encode($arr1);

echo "<p>";
echo "Meerdimensionale array: ", json_encode($ingredienten);


?>