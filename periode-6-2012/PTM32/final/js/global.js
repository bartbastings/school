// vistors values
var total = 350;
var visitors = 100;

//server url
var urlAthena = 'http://athena.fhict.nl/users/i245215/screen_stratum_final/';
var urlServer = 'http://kinderopvangbanholt.nl/screen_stratum_final/';
var urlLocal = 'http://localhost/screen_stratum_prezi_final/';
var url = urlLocal;

// events calender scrool effect
$(function(){
	$('.vertical-ticker').totemticker({
		row_height	:	'163px',
	});
});

// twitter balk side scroll effect
$(function(){
	$("#tweetNewsFeed").liScroll();
});


function header(){
	// get time
	var d = new Date();
	var minutes = d.getMinutes();
	var hours = d.getHours();
	var time = 'Time: '+hours+':'+minutes;
	// poeople count
	getPeopleCount();
	//place in html element
	$("#time").html(time);
	$("#peoplecount").html(peopleCount);
}

function headerCycle(time){
	setInterval(header, time);
}

// 
$(document).ready(function(){
	showDayevents('day1event');
	dayEventCycle(5000);
	spotlightCycleTotal(10000);
	alert('first');
	getTweets();
	header();
	headerCycle(60000);
});
