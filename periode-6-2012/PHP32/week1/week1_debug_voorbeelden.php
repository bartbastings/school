<?php
// var_dump
$result=1/5;
var_dump ($result);
echo "<br />";
?> 
<?php
// try and catch
function inverse($x) {
    if ($x==0) {
        throw new Exception('Division by zero.');
    }
    else return 1/$x;
}

try {
    echo inverse(5) . "<br />";
    echo inverse(0) . "<br />";
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "<br />";
}
?>
<?php
//debug_check
$debug_check = 1;
$array = array("aap","noot", "mies");

foreach ($array as $data) {
    if ($debug_check == 1) {
        echo $data . "<br />";
	}
}
?>
<?php
// print_r
print_r($array);
echo "<br />";
?>
<?php
// exit
$result=0;
$result++;
exit("Result of variable \$result: $result\n");
echo "Dit wordt niet meer uitgevoerd!<br />";
?>