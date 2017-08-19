//
function getTweets(){
	$.ajax({
		cache: false,
		type: "GET",
		url: 'http://kinderopvangbanholt.nl/twitter-api-php-master/index.php?type=json',
		contentType: "application/json",
		async: false,
		success: function(data){
			console.log(data); 
		},
		error: function(data){
			console.log(data);
		} 
	}); 
}