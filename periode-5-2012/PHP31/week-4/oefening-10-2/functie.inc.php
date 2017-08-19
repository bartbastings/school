<?php

function toon_sessie(){
	$regels = '<br/><hr>';
	$regels .= '<strong>$_SESSION[\'sid\']</strong> = '.$_SESSION['sid'].'<br/>';
	$regels .= '<strong>session_id</strong> = '.session_id.'<br/>';
	$regels .= '<strong>PHPSESSID</strong> = '.$_COOKIE['PHPESSID'].'<br/>';

	$regels .= '<h3>Header</h3><ul>';
	foreach ($_SERVER as $key => $value){
		if(stripos($key, 'http') === 0){
			$regels .= "<li><strong>$key</strong> = $value</li>\n";
		}
	}
	$regels .= '</ul>';

	$regels .= '<h3>Cookies</h3><ul>';
	foreach($_COOKIE as $key => $value){
		$regels .= "<li><strong>$key</strong> => $value</li>";
	}
	$regels .='</ul>';

	$regels.= '<h3>Session</h3><ul>';
	foreach((array)$_SESSION as $key => $value){
		$regels .= "<li><strong>$key</strong> => $value</li>";
	}
	$regels .= '</ul>';

	return $regels;
}

?>