<?php

function maak_form(){
	$regel ='<form name="fac", method="GET", action="./opdracht8.php">'.RET.
			'Commentaar: '.RET.
			'<input type="submit" name="bereken" value="druk hier"/>'.RET.
			'<input type="submit" name="wissen" value="Wissen"/>'.RET.
			'</form>'.RET;
			return $regel;
}

function tekst($com){
	$nm = array('<strong><h3>EA bevestigt Battlefield 4</h3></strong>'=>'<p class="tekst">Vind je dat Battlefield 3 de ultieme multiplayer-ervaring biedt? Nou pech gehad! Battlefield 4 wordt veel en veel beter dan Battlefield 3! Oh ja, dat balletje begint al te rollen, dankzij EA zelf.
<br/>
Industrygamers zag meerdere Twitteraars 180 tekens volkalken over de speech die el EA presidente Frank Gibeau gaf bij de University of Southern California. Zijn woorden waren simpelweg: “There is going to be a Battlefield 4.” Waarschijnlijk heeft DICE alleen nog wat wilde ideeën op cocktailservetten van de BF3-launchparty, maar er wordt dus al gewerkt aan het vierde deel! Phew, zat de Wacht hem toch even te knijpen. Voor je het weet beginnen die malle gamedevelopers aan een puzzelaar of RPG.
<br/>
Oh ja, een nieuwe Call of Duty voor 2012 is ook al bevestigd door Activision. Just so you know.</p>'
,'<strong><h3>Game of Thrones action-RPG in beeld</h3></strong>'=>'<p class="tekst">Vreemd genoeg staat mijn review van Game of Thrones: Genesis nog steeds online. Ik had verwacht dat ie ondertussen wel een gat door de PU-server had gebrand. Maar goed, samengevat was de RTS van George R.R. Martins epos drakenpoep. Cyanide bevestigde echter tijdens diens release dat ze ook al jaren werken aan een action-RPG. Daar hebben ze nu de eerste plaatjes en info over losgelaten. En wat blijkt? Het ziet er niet slecht uit! Check de andere screens op Videogames Plus. De game wordt uitgegeven door Atlus, bekend op het gebied van JRPG’s. Martin heeft zelf twee nieuwe personages bedacht en een verhaal voor ze geschreven. In ieder geval staat al vast dat het om een paar oorlogsveteranen gaat. Ondanks alles durft de Wacht nog niet mild optimistisch te zijn. Hij heeft nog nachtmerries van Game of Thrones: Genesis. Snel op weg naar het volgende nieuwtje!</p>'
,'<strong><h3>Nieuwe Xbox toch kerst 2012?</h3></strong>'=>'<p class="tekst">Collega Graddus vond gisteren al de next-gen Xbox-ramblings van een zekere MS Nerd op het internet. Vandaag heb ik opnieuw smakelijke citaten, en wel uit de Windows Weekly podcast, waar meerdere techjournalisten uit de states rond de tafel zitten. Onder andere Paul Thurrott, die al over Windows en andere Microsoft-producten schrijft sinds halverwege de jaren ’90. Hij werd rond de 88e minuut van het gesprek gevraagd te speculeren samen met de info die hij al weet.
</br>
Hij noemt de volgende Xbox ‘Project Ten’ en gelooft dat Microsoft de nieuwe console rond de kerstdagen van 2012 gaat verschepen. Hij is er daardoor van overtuigd dat de softwarereus op de Consumer Electronics Show in januari de shit naar buiten gaat brengen. Zijn speculatie over wat het apparaat allemaal kan, komt aardig overheen met MS Nerds visie. De nieuwe Xbox wordt met een Apple-mentaliteit ontworpen en zal dus op allerlei manier met Windows voor de PC en smartphones kunnen communiceren. Het blijft natuurlijk allemaal speculeren totdat Microsoft z’n giecheltje opent, maar Thurrott heeft als Windows-gek vast wel een paar betrouwbare bronnen. Hoe dan ook, volgend jaar moet Microsoft bijna wel met een onthulling komen.</p>'
,'<strong><h3>Total Recall krijgt MMO</h3></strong>'=>'<p class="tekst">Er komt een MMO van Total Recall uit. Hou op met lachen! Het gaat wel om een film van Nederlandse regisseur Paul Verhoeven, die een geinige mix van campy en Inception-achtige sci-fi naar het witte doek bracht. Bovendien is het nog steeds de film met de meeste gekke bekken van Arnold Schwarzenegger, en dat is een moeilijk te behalen titel als je zijn werk kent.
<br/>
Sony kwam met het nieuws aanzetten. De Verhoeven-flick wordt omgezet in een browser-MMO, free to play maar wel met PVE en PVP-mogelijkheden. De Chinese studio ZQGame ontwikkelt de game, en nee je hoeft je niet te schamen als je nog nooit van hen gehoord hebt. Eigenlijk vindt de Wacht het ook een ramp op een wielen, maar het is leuk om te zien dat er nog gamedevs en publishers zijn die gestoorde faaltastische ideeën verwezenlijken.
</br>
Nou ja, niet helemaal gestoord. De game zal zich vast volledig richten op de remake met Colin Farrell, die voor volgend jaar gepland staat. Ach fuck het! Ik gooi gewoon een ouwe trailer van het origineel hieronder. Lachen jullie effe mee?</p>');
	
	$regel = '<ul>';
	foreach($nm as $key => $value){
		$regel .="<li>$key</li><li>$value</li>";
	}
	$regel .='</ul>';
	return $regel;
}

?>