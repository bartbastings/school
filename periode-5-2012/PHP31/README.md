# PHP 31
## Week 1 - PHP Introductie

### Opdracht 1 - Installatie
- Lees hoofdstuk 1 t/m 4 van de basiscursus PHP6 en MySQL.
- Installeer de meest recente WAMP of MAMP server op je laptop. Activeer PHP6 en controleer of alles werkt door een Hello World applicatie te maken in PHP.
- Maak in je WWW folder mappen aan voor de opdrachten, bijvoorbeeld WWW/PHP31/week1, WWW/PHP31/week2, etc. Sla alle opdrachten ook per week op..

### Opdracht 2 - herhaling HTML/CSS/JavaScript
- Lees hoofdstuk 5 van de basiscursus PHP6 en MySQL.
- Maak een eenvoudige webpagina waarmee je HTML, CSS, JavaScript (of
jQuery) combineert.
- Voeg aan deze pagina ook een deel PHP toe. Experimenteer met de declaratie
van een variabele.

### Opdracht 3 - Oefeningen uit Basiscursus PHP6 & MySQL
- Maak oefening 5.2 (quotes)
- Maak oefening 5.4 (variabelen)
- Maak oefening 5.5 (Include())
- Maak oefening 5.6 (Regeleinden)

Link: [oefening 5.2](week-1/oefening-5-2)
Link: [oefening 5.3](week-1/oefening-5-3)
Link: [oefening 5.4](week-1/oefening-5-4)
Link: [oefening 5.5](week-1/oefening-5-5)
Link: [oefening 5.6](week-1/oefening-5-6)

## Week 2 - Hoofdstuk 6 & 7

### Opdracht 1 - Variabelen
Zie de onderstaande vijf variabelen declaraties:
voornaam = "Ahrend";
$1e achternaam = "Dreverhaven"; $adres = Dorpsstraat 108;
$e-mail = "a.dreverhaven@hotmail.com" $de_website = "www.dreverhaven.nl";

- Welke syntax fouten worden er in de bovenste voorbeelden gemaakt?
- Bekijk de coding guidelines voor variabelen declaraties op [framework.zend.com](https://framework.zend.com/manual/1.12/en/coding-standard.naming-conventions.html).
- Herschrijf de variabelen zo, zodat ze voldoen aan de hier genoemde richtlijnen.
- Maak een PHP programma die de waardes toont.

Link: [Opdracht 1](week-2/opdracht-1)

### Opdracht 2 - Strings en Quotes
Zie de onderstaande zin:

Rasmus Lerdorf is de maker van "PHP". Hij ontwikkelde deze "server-side scripttaal" in 1994.

- Sla elke zin op in een aparte variabele.
- Zorg ervoor dat de bovenstaande zinnen getoond wordt in je browser.

Link: [Opdracht 2](week-2/opdracht-2)

### Opdracht 3 - Datatypes
Zie de onderstaande waardes:

a) Goede morgen!
b) 42
c) 187,12
d) 0
e) - 0.154
f) True

Declareer een variabele voor elke van de bovenstaande waardes. Geef voor elke variabele aan van welk type de variable is en waarom. Let op: je mag niets aan de waardes veranderen!

Link: [Opdracht 3](week-2/opdracht-3)

### Opdracht 4 - Operatoren
Zie de volgende drie variabelen declaraties:

$Mike = 20;
$Dennis = 21;
$Rudi = "23";
$Dave = 20;

- Van welk datatypes zijn deze variabelen?
- Wat is het resultaat van de volgende vergelijkingsoperatoren? Leg ook uit
waarom.
  - $Mike == $Dennis;
  - $Mike < $Dennis;
  - $Mike < $Rudi;
  - $Rudi === $Dennis;
- Wat is het resultaat van de volgende expressies? Leg ook uit waarom
  - $Dennis + $Mike;
  - $Dennis . $Mike;
  - $Rudi . $Dennis;
  - $Rudi = $Dave;
- Wat is het resultaat van de volgende booleaanse operatoren? Leg uit waarom.
  - $Mike === $Dave && $Mike < $Dennis;
  - $Dennis > $Dave || $Mike <= $Dave;
  - $Dennis <= $Rudi || $Dave;
  - $Dave >= $Mike && $Dave <= $Mike;

Link: [Opdracht 4](week-2/opdracht-4)

### Opdracht 5 - String functies
Het boek geeft een aantal voorbeelden van string functies. PHP biedt nog veel meer mogelijkheden dan de functies die in het boek worden genoemd. Voor een compleet overzicht van alle string functies, ga naar:

Link: [http://www.php.net/manual/en/book.strings.php](http://www.php.net/manual/en/book.strings.php)

Deze vraag heeft betrekking op de volgende zin:

Wiki Loves Monuments: Fotografeer een monument voor Wikipedia en win!

Maak een PHP programma waarbij string functies worden gebruikt om het volgende in je browser te tonen:
- Precies deze zin.
- De lengte van deze zin.
- Dezelfde zin geheel in hoofdletters.
- Dezelfde zin geheel in kleine letters.
- Dezelfde zin waarbij de hoofd- en kleine letters zijn omgedraaid.
- Dezelfde zin, waarbij het woord 'monument' is vervangen door 'aardappel'.
- Dezelfde zin in omgekeerde volgorde.

Link: [Opdracht 5](week-2/opdracht-5)

### Opdracht 6 - Functies voor getallen
Zie de PHP manual voor een uitgebreid overzicht van alle mathematische functies: [http://www.php.net/manual/en/book.math.php](http://www.php.net/manual/en/book.math.php)
- Leg het verschil uit tussen round() en floor();
- Leg aan de hand van de PHP documentatie het verschil uit tussen mt_rand() en rand(). Beredeneer waarom beide functies worden aangeboden in PHP.

Opdracht niet meer aanwezig.

### Opdracht 7 - Arrays en array functies
- Maak een gewone array met daarin alle maanden van het jaar;
- Toon de zomermaanden van het jaar door de juiste index op te geven;
- Itereer met foreach door de array en toon alle maanden in de browser;
- Sorteer de array op alfabetische volgorde en toon de eerste 4 maanden;
- Maak een nieuwe associatieve array van alle maanden van het jaar, gebruik de letter A t/m L als index. Toon de index en de bijbehorende waarden in je browser.
- Toon alle waarden van de array $_SERVER in de browser.

Link: [Opdracht 7](week-2/opdracht-7)

### Opdracht 8 - Conditionele Statements
- Lees de coding guidelines voor if-else en het switch statement en pas deze toe in deze opdrachten (en de rest van de cursus): [framework.zend.com](https://framework.zend.com/manual/1.12/en/coding-standard.naming-conventions.html)
- Definieer een variabele "temperatuur";
- Definieer een if-elseif-else statement die de volgende boodschappen toont in de browser:
  - als de temperatuur kleiner is dan 0, wordt de boodschap "het vriest"
  - als de temperatuur lager is dan -273.15 wordt de boodschap "dat kan dus niet...".
  - als de temperatuur tussen de 0 en de 35 is, wordt de boodschap "prima weertje!"
  - als de temperatuur boven de 35 graden komt wordt de boodschap "heet!"

Link: [Opdracht 8](week-2/opdracht-8)

### Opdracht 9 - Switch statement
- Maak een switch case statement op basis van de maanden van het jaar. Dus 0 = januari, 1 = februari, 2 = maart etc...
- Herschrijf de boodschap uit de vorige opdracht met een switch statement. Vergeet nooit een default te definiëren bij een switch statement.

Link: [Opdracht 9](week-2/opdracht-9)

### Opdracht 10 - Iteratie
- Gebruik een while loop om de tafel van 10 te echoën;
- Gebruik een do-while loop om de tafel van 10 te echoën;
- Gebruik een for-loop om de tafel van 10 te echoën;
- Welke loop vind je het meest prettig of geschikt en waarom?

Link: [Opdracht 10](week-2/opdracht-1-)

### Opdracht 11 - POST en GET
- Controleer in je PHP.ini file of het volgende is ingesteld:
  - display_errors = On
  - error_reporting = E_ALL
- Maak webapplicatie die uit twee pagina's bestaat. Een welkomspagina en een exitpagina. Zorg ervoor dat je met een URL parameter met de naam "page" kan bepalen op welke pagina je terecht kan komen.
- Breidt voorbeelden week2_post.php en week2_get.php uit, zodat je geen PHP "Notice: " boodschappen ziet als de GET of POST array niet gevuld is.
- Breidt voorbeeld week2_post.php uit. Zorg ervoor dat er een extra veld komt waarin je een datum kunt invoeren. Toon alle POST argumenten met de foreach functie.

Link: [Opdracht 11](week-2/opdracht-11)

### overige
- Link: [Oefening 6.1](week-2/oefening-6-1)
- Link: [Oefening 6.2](week-2/oefening-6-2)
- Link: [Oefening 6.3](week-2/oefening-6-3)
- Link: [Oefening 6.4](week-2/oefening-6-4)
- Link: [Oefening 6.5](week-2/oefening-6-5)
- Link: [Oefening 6.6](week-2/oefening-6-6)
- Link: [Oefening 6.6](week-2/oefening-6-7)
- Link: [Oefening 7.1](week-2/oefening-7-1)
- Link: [Oefening 7.2](week-2/oefening-7-2)
- Link: [Oefening 7.3](week-2/oefening-7-3)

## week 3 - functies en tijdrekenen
Geef bij elke functiedefinitie minimaal het volgende commentaar:
- korte omschrijving;
- parameters
- retourwaarde
Gebruik hiervoor PHPDoc syntax.

### Opdracht 1
Breid de functie in " week3_voorbeeld1.php " zodanig uit dat eerst wordt gecontroleerd of er wel een numeriek getal wordt meegegeven als argument. Als het argument niet is te converteren dan moet het script de foutmelding "Fout: $getal is geen numerieke waarde" op het scherm tonen.

Link: [Opdracht 1](week-3/opdracht-1)

### Opdracht 2
Schrijf een functie die iemands voornaam, achternaam, geboortejaar, maand en dag als argumenten neemt en de complete naam en leeftijd teruggeeft. Zorg ervoor dat je programma ook in 2012 of later het juiste resultaat geeft. Controleer of de eerste twee argumenten een string zijn en het derde argument een integer.

Link: [Opdracht 2](week-3/opdracht-2)

### Opdracht 3
- Schrijf een functie die de huidige datum en tijd teruggeeft, maar doe dit alleen als een variabele "wachtwoord" gelijk is aan "secret". Als het wachtwoord een andere waarde heeft geef dan de boodschap "not authorized" terug.
- Beargumenteer of en waarom je gebruik hebt gemaakt van een global of local variabele voor de wachtwoord controle.

Link: [Opdracht 3](week-3/opdracht-3)

### Opdracht 4
- Schrijf een functie derdeMacht($getal) die de derde macht van $getal teruggeeft aan het aanroepende statement. Een aanroep als echo derdeMacht( 3 ); moet dus het getal 27 opleveren.
- Schrijf een functie totdeMacht($getal, $aantal) die de macht $aantal van het $getal teruggeeft aan het aanroepende statement. Een aanroep als echo derdeMacht( 3, 4 ); moet dus het getal 81 opleveren.

Link: [Opdracht 1](week-3/opdracht-4)

### Opdracht 5
Schrijf een functie die een datum uit het verleden als argument accepteert en het aantal jaar, maanden, weken, dagen, uren en seconden tot nu teruggeeft.

Link: [Opdracht 1](week-3/opdracht-5)

### Opdracht 6
- Schrijf een functie die willekeurige reeksen van de letters A-B-C teruggeeft. Als de letters driemaal hetzelfde zijn dan wordt de boodschap "Jackpot" getoond.
- Toon de cijfer reeksen in aparte div elementen en geef ze vorm met CSS. Zorg voor een duidelijke scheiding van vormgeving en functionaliteit.

Link: [Opdracht 1](week-3/opdracht-6)

### Opdracht 7
- Schrijf een functie die een variabel aantal argumenten kan ontvangen. Roep deze functie met verschillende aantallen argumenten aan en schrijf de waarden van deze argumenten in een lus naar het scherm. Neem in de lus tevens een opdracht op die het datatype van het argument op het scherm toont.
- Laat de functie controleren of één van de argumenten een array is. Zo ja, schrijf de inhoud van de array naar het scherm

Link: [Opdracht 1](week-3/opdracht-7)

### Opdracht 8
In deze opdracht ga je een functie maken die een commentaar lijst toont op het scherm. Definieer een associatieve array waarin naam en commentaar is opgeslagen. Maak een functie die deze array uitleest en er het volgende mee doet:
- Strip alle eventuele HTML tags die in de naam of het commentaar staan;
- Toon de naam en commentaar in een zelfgekozen HTML structuur, gebruik CSS om het commentaar vorm te geven.

Link: [Opdracht 1](week-3/opdracht-8)

### overige
- Link: [Oefening 8.1](week-3/oefening-8-1)
- Link: [Oefening 8.2](week-3/oefening-8-2)
- Link: [Oefening 8.3](week-3/oefening-8-3)
- Link: [Oefening 8.4](week-3/oefening-8-4)
- Link: [Oefening 9.1](week-3/oefening-9-1)
- Link: [Oefening 9.2](week-3/oefening-9-2)
- Link: [Oefening 9.3](week-3/oefening-9-3)
- Link: [Oefening 9.4](week-3/oefening-9-4)

## week 4

### overige
- Link: [Oefening 10.1](week-4/oefening-10-1)
- Link: [Oefening 10.2](week-4/oefening-10-2)
- Link: [Oefening 10.3](week-4/oefening-10-3)
- Link: [Oefening 10.4](week-4/oefening-10-4)
- Link: [Oefening 11.1](week-4/oefening-11-1)
- Link: [Oefening 11.2](week-4/oefening-11-2)

## week 5

### overige
- Link: [Oefening 12.2](week-4/oefening-12-1)
- Link: [Oefening 12.3](week-4/oefening-12-3)