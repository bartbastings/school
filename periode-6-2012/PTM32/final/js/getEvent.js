// get events from athena server
var countJson = 0; 

function getEvent(){
	$.ajax({
		cache: false,
		type: "GET",
		url: url+"/php_athena/index.php?get=event",
		contentType: "application/json",
		async: false,
		success: function(data) {
			loopJson(data.events);
		},
		error: function(){
			alert('getEvent failure');
		}
	}); 
}

function loopJson(json){
	if(json.length < countJson){
		countJson++;
		var musicGenre = json[countJson]['musicGenre'];
		var eventVisitors = json[countJson]['eventVisitors'];
		genreCycle(musicGenre);
		visitors = eventVisitors;
		//spotlightCycleTotal(musicGenre, eventVisitors);
	}
	else{
		countJson = 0;
		var musicGenre = json[countJson]['musicGenre'];
		var eventVisitors = json[countJson]['eventVisitors'];
		genreCycle(musicGenre);
		visitors = eventVisitors;
		//spotlightCycleTotal(musicGenre, eventVisitors);
	}
}