<?php

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

?>