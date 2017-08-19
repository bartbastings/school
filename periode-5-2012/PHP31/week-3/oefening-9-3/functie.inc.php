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

function toontijdinfo($unixtijd = 0){
	$regels = '<h4>Get Date</h4>';
	$regels .= '<ul>';
	$rij = getdate($unixtijd);
	foreach($rij as $key => $value){
		$regels .="<li>$key = $value</li>";
	}
	$regels .='</ul>';
	
	$regels .= '<h4>Get Time Of Day</h4>';
	$regels .= '<ul>';
	$rij = gettimeofday();
	foreach($rij as $key => $value){
		$regels .="<li>$key = $value</li>";
	}
	$regels .= '</ul>';
	return $regels;
}

?>