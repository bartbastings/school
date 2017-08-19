<?php
include('lib/twitteroauth.php');
include('lib/indent.php');

$type = $_GET['type'];

function searchHashtag($search,$count){
	$consumerKey = "JVQdcimsqX7QXBP3Sct4A";
	$consumerSecret = "R5MRKyNHaoLwvpaGLuDKESSVhmtne0ohbatmQDk";
	$oauthAccessToken = "951004092-AHarLeXdv6V8JldcL067pq1BvBoLYfAqIqCQZi4U";
	$oauthAccessTokenSecret = "ek0egXmmahBPLu1hYHIReNPZsEfEhaxk9bfRXp6v6f38U";
	
	$twitter = new TwitterOAuth($consumerKey, $consumerSecret, $oauthAccessToken, $oauthAccessTokenSecret);
	
	$url = "https://api.twitter.com/1.1/search/tweets.json";
	$tweetArray = array('tweet'=>array());
	$parameters = array('q' => $search, 'result_type' => 'recent', 'count' => $count);
	$tweets = $twitter->get($url,$parameters);
	foreach($tweets->statuses as $tweet){
		$tweetArrayRow = array(
		'username'=>$tweet->user->name,
		'text'=>$tweet->text
		);
		array_push($tweetArray['tweet'],$tweetArrayRow);
	}
	return json_encode($tweetArray);
}

if($type == 'json'){
	if (isset($_GET['keyword'])) {
		$keyword = $_GET['keyword'];
		
		header('Content-type: text/json');
		header('Content-type: application/json');
		header('Acces-Control-Allow-Origin: *');
		
		$tweets = searchHashtag($keyword,10);
		
		echo $tweets;
		exit();
	}	
}
?>