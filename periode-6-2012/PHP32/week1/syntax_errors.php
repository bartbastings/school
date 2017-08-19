<?php
// Zoek en verbeter de 7 syntax errors in het volgende programma.
// Rij van Fibonacci
// Elk element van de rij is steeds de som van de twee voorgaande elementen, beginnend met 0 en 1
// 0, 1, 1, 2, 3, 5, 8, 13, 21, 34, 55, 89, 144, 233, 377, 610, 987, 1597, 2584, 4181, 6765, 10946, ...

$nums = array();
// Vul de eerste en tweede plaats in de array
// regel 10 de ; comma is vergeten, deze syntaxisfaout wordt automatich weegeven in dreamweaver.
$nums[1]=0;
$nums[2]=1;

// Vul de derde en volgende plaatsen in de array
// regel 16 de ( moet verwijderd worden en de for lus moet afgesloten worden met } sluiten
for ($i=3; $i<100; $i++) {
	$nums[$i] = $nums[$i-1] + $nums[$i-2];
}

// Toon de Fibonacci reeks
// bij regel 24 moet op het einde van de string de ' vervangen worden door ' zodat de string zich goed afsluit.
// bij regel 25 moet bij 1 voor de " een \ staan zodat het in de string wordt opgenomen.
// bij regel 27 moet bij .$nums[$j] in [] en niet in (), moet zeggen deze fout was moelijk te vinden, gaf geen syntaxis fout. Dus je moest zelf de fout opsporen.
//bij regel 26 moet voor bij de j <100 eeb $ teken voorstaan, maar deze fout werd ook niet autmatichse wegeven, door het programma te runnen zag ik dat de tabel langer dan honderd werd, en wist waar ik moest kijken.
echo "Fibonacci Reeks<br />";
echo "<table border=\"1\">";
for ($j=1; $j<100; $j++) {
	echo "<tr><td>".$j."</td><td>".$nums[$j]."</td></tr>";
}
echo "</table><br /><br />";


//echo ini_set('display_errors',1); // toon foutmeldingen

//echo error_reporting(E_ALL); // alle foutmeldingen laten zien

?>


