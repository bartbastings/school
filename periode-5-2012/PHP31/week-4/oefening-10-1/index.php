<?php

$oefening = 10.1;

include('html_kop.inc.php');

echo "\n<h1>Oefening $oefening</h1>\n";
echo "\n<h2>Werken met cookies</h2>";

//include('functie.inc.php');

echo 'Nu: '.date('d-m-Y H:i:s', time()).'<br/>';
if(isset($_COOKIE['koekje'])){
	echo 'Koekje geldig tot: '.$_COOKIE['geldigtot'];
}
else{
	$tot = time() + 120;
	setcookie('koekje','Cookie monster',$tot);
	setcookie('geldigtot',date('d-m-Y H-i-s',$tot), $tot);
	echo 'Nieuwe koekje tot: '.date('d-m-Y H:i:s', $tot);
}


/*
echo 'Nu: '.date('d-m-Y H:i:s', time()).'<br/>';

if(isset($_COOKIE['koekje'])){
	echo 'Koekje geldig tot: '.$_COOKIE['geldigtot'];
}
else{
	$tot = time() + 120;
	setcookie('koekje','Cookie monster',$tot);
	setcookie('geldigtot',date('d-m-Y H-i-s',$tot), $tot);
	echo 'Nieuw koekje tot: '.date('d-m-Y H-i-s', $tot);
}
*/

/*
$tot = time() + 120;
setcookie('koekje','Cookie monster',$tot);
setcookie('geldigtot',date('d-m-Y H-i-s',$tot), $tot);
echo date('d-m-Y H:i:s', $tot);
*/

include('html_staart.inc.php');

?>