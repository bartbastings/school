// get tweets from server
function getTweets(){
	$.ajax({ 
	cache: false,
	type: "GET",
	url: url+"/twitter/index.php?type=json",
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
				//listItem.appendTo( "#tweetNewsFeed" );
				$("#tweetNewsFeed").html(listItem);
			};
		},
		error: function(){
			alert('twitter error');
		} 
	}); 
}