// get events from server
var peopleCount = '';

function getPeopleCount(){
	$.ajax({
		cache: false,
		type: "GET",
		url: url+"php_peoplecount/index.php?get=peoplecount",
		contentType: "application/json",
		async: false,
		success: function(data) {
			peopleCount='Aanwezige Stratumseind: '+(data['people count']);
		},
		error: function(){
			alert('getPeopleCount failure');
		}
	}); 
}