// spotlight
function genreCycle(events){
	switch (events){
		case 'Dance':
			$(".genre").html('<img src="images/genre_dance.png" alt="genre Image Dance"><h3>Dance</h3>');
		break;
		case 'Nederlandstalig':
			$(".genre").html('<img src="images/genre_nederlands.png" alt="genre Image Nederlandstalig"><h3>Nederlandstalig</h3>');
		break;
		case 'Rock':
			$(".genre").html('<img src="images/genre_rock.png" alt="genre Image Rock"><h3>Rock</h3>');
		break;
		case 'Pop':
			$(".genre").html('<img src="images/genre_pop.png" alt="genre Image Pop"><h3>Pop</h3>');
		break;
		case 'Urban':
			$(".genre").html('<img src="images/genre_urban.png" alt="genre Image Urban"><h3>Urban</h3>');
		break;
		default:
			alert("genreCycle error");
		break;
	};	
};

function spotlightEvent(events){
	switch (events){
		case 1:
			$(".uitgelicht").html('<img src="images/spotlight1.jpg" alt="spotlight 1">');
			genreCycle('Pop');
			$("#visitorsChartSpotlight1").fadeIn('slow');
			$("#visitorsChartSpotlight2").hide();
			$("#visitorsChartSpotlight3").hide();
			$("#genderChartSpotlight1").fadeIn('slow');
			$("#genderChartSpotlight2").hide();
			$("#genderChartSpotlight3").hide();
		break;
		case 2:
			$(".uitgelicht").html('<img src="images/spotlight2.png" alt="spotlight 2">');
			genreCycle('Rock');
			$("#visitorsChartSpotlight1").hide();
			$("#visitorsChartSpotlight2").fadeIn('slow');
			$("#visitorsChartSpotlight3").hide();
			$("#genderChartSpotlight1").hide();
			$("#genderChartSpotlight2").fadeIn('slow');
			$("#genderChartSpotlight3").hide();
		break;
		case 3:
			$(".uitgelicht").html('<img src="images/spotlight3.png" alt="spotlight 3">');
			genreCycle('Dance');
			$("#visitorsChartSpotlight1").hide();
			$("#visitorsChartSpotlight2").hide();
			$("#visitorsChartSpotlight3").fadeIn('slow');
			$("#genderChartSpotlight1").hide();
			$("#genderChartSpotlight2").hide();
			$("#genderChartSpotlight3").fadeIn('slow');
		break;
		default:
			alert("genreCycle error");
		break;
	};	
};
//
var spotlightNumber = 1;
function spotlightCycle(){
	spotlightNumber ++;
	switch (spotlightNumber){
		case 1:
			spotlightEvent(1);
		break;
		case 2:
			spotlightEvent(2);
		break;
		case 3:
			spotlightEvent(3);
			spotlightNumber = 0;
		break;
		default:
			alert("spotlightCycle error");
		break;
	}
};
//
function spotlightCycleTotal(time){
	setInterval(spotlightCycle,time);
}