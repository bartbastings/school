<?php
$oefening = 3;

include('html_kop.inc.php');

echo "\n<h1>Opdracht $oefening</h1>\n";

echo "\n<h3>Replace</h3>\n";

if(isset($_POST['aanmelden'])){
	
	$patroon = $_POST['patroon'];
	$replace = $_POST['replace'];
	$regel = $_POST['regel'];
	
	if (preg_match($patroon, $regel, $match)) {
		
		echo preg_replace($patroon, $replace, $regel);
		
	}
	
	else{
		echo "regel";
	}

}

error_reporting(E_ALL); 

?>

<form action="" method="post">
 <table>
        <tr>
        	<td>Regular Expression Patroon</td>
            <td><input type="text" name="patroon" value="" /></td>
		</tr>
        <tr>
        	<td>Replacement</td>
            <td><input type="text" name="replace" value="" /></td>
		</tr>
        <tr>
        	<td>Test de volgende regel</td>
            <td><textarea name="regel">De script is mislukt</textarea></td>
        </tr>
        <tr>
        	<td colspan="2"><input type="submit" name = "aanmelden" value="Test"/></td>
        </tr>          
</table>           
</form>
<?php

echo "\n<h3>Replace email</h3>\n";

$email = $_POST['email'];

if(isset($_POST['link'])){
	
	if (preg_match("#^.+@{1}.+.(com|nl)$#", $email, $match)) {
		
		$subject = $match[0];
		$pattern = '#^.+@{1}.+.(com|nl)$#';
		$replace = '<a href= "mailto:)$0(">$0</a>';
		$a = preg_replace($pattern, $replace, $subject);

		}
		
		else{
			$a = "geen valide email";
		}
}





?>

<form action="" method="post">
 <table>
        <tr>
        	<td>email</td>
            <td><input type="text" name="email" value="" /></td>
		</tr>
        <tr>
        	<td>link</td>
        	<td><?php echo $a; ?></td>
        </tr> 
        <tr>
        	<td colspan="2"><input type="submit" name = "link" value="Link"/></td>
        </tr>         
</table>           
</form>

<?php
include('html_staart.inc.php');
?>
