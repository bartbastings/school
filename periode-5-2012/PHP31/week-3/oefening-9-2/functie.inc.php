<?php

function maakstraks($seconden =0){
	return time() + $seconden;
}

function toontijd($unixtijd = 0){
	return date('H:i:s', $unixtijd);
}

function toondatum($unixtijd = 0){
	return date('d-m-Y', $unixtijd);
}

?>