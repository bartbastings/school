//
/*
function getTweetsServer(){
	$.ajax({ 
	//crossDomain: true,
	cache: false,
	type: "GET",
	url: "http://kinderopvangbanholt.nl/twitter-api-php-master/index.php?type=json",
	contentType: "application/json",
	async: false,
	success: function(data) {
			alert('getTweetsServer succes');
			console.log('getTweetsServer success'); 
			//console.log(data); 
		},
		error: function(){
			alert('getTweetsServer failure');
			console.log('getTweetsServer failure'); 
			//console.log(data);
		} 
	}); 
}
*/
function getTweetsAthena(){
	$.ajax({ 
	//crossDomain: true,
	cache: false,
	type: "GET",
	url: "http://athena.fhict.nl/users/i245215/twitter/index.php?type=json",
	contentType: "application/json",
	async: false,
	success: function(data) {
		var JSONData = JSON.stringify(data);
		var parsedData = JSON.parse(JSONData);
		//console.log('getTweetsAthena succes');
		for (var JSONCounter=0; JSONCounter < data.tweet.length; JSONCounter++) {
				var username = data.tweet[JSONCounter]["username"];
				var text = data.tweet[JSONCounter]["text"];
				var listItem = '<li class="newstickerListItem"><span class="listItemUsername">'+username+'</span>: '+text+'</li>';
				$("#tweetNewsFeed").html(listItem);
			};
		},
		error: function(){
			alert('getTweetsAthena failure');
			//console.log('getTweetsServer failure'); 
			//console.log(data);
		} 
	}); 
}