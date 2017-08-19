// events calender scrool effect
$(function(){
	$('.vertical-ticker').totemticker({
		row_height	:	'163px',
	});
});
// show dayevents
function showDayevents(eventday){
	switch (eventday){
		case "day1event":	
			$("#day1event").show();
			$("#day2event").hide();
			$("#day3event").hide();
			$("#day4event").hide();
			$("#day1").css("color","#00e046");
			$("#day2").css("color","#21262D");
			$("#day3").css("color","#21262D");
			$("#day4").css("color","#21262D");
		break;
		case "day2event":
			$("#day1event").hide();
			$("#day2event").show();
			$("#day3event").hide();
			$("#day4event").hide();
			$("#day1").css("color","#21262D");
			$("#day2").css("color","#00e046");
			$("#day3").css("color","#21262D");
			$("#day4").css("color","#21262D");
		break;
		case "day3event":
			$("#day1event").hide();
			$("#day2event").hide();
			$("#day3event").show();
			$("#day4event").hide();
			$("#day1").css("color","#21262D");
			$("#day2").css("color","#21262D");
			$("#day3").css("color","#00e046");
			$("#day4").css("color","#21262D");
		break;
		case "day4event":
			$("#day1event").hide();
			$("#day2event").hide();
			$("#day3event").hide();
			$("#day4event").show();
			$("#day1").css("color","#21262D");
			$("#day2").css("color","#21262D");
			$("#day3").css("color","#21262D");
			$("#day4").css("color","#00e046");
		break;
		default:
			alert("error");
		break;
    }
}
// twitter balk side scroll effect
$(function(){
	$(
	"ul#tweetNewsFeed").liScroll();
});
// google load package
google.load("visualization", "1", {packages:["corechart"]});
// gender values
var man = 378;
var vrouw = 78;
// goolge chart gender
google.setOnLoadCallback(drawGenderChart);
function drawGenderChart() {
  var data = google.visualization.arrayToDataTable([
	['gender', 'number '],
	['Man', man],
	['Vrouw', vrouw]
  ]);

  var options = {
	  legend: 'none',
	  pieSliceText: 'none',
	  pieSliceBorderColor: '#00e046',
	  backgroundColor: 'none',
	  chartArea:{
		  height: '100%'
	  },
	  tooltip: { 
		  trigger: 'none' 
	  },
	  slices: {
		  0: { color: '#00e046' },
		  1: { color: '#ffffff' }
	}
};

  var chart = new google.visualization.PieChart(document.getElementById('genderChart'));
  chart.draw(data, options);
}
// vistors values
var total = 450-378;
var visitors = 378;
// goolge chart gender
google.setOnLoadCallback(drawVisitorsChart);
function drawVisitorsChart() {
	
  var data = google.visualization.arrayToDataTable([
	['value', 'number '],
	['', total],
	['', visitors]
  ]);

  var options = {
	  legend: 'none',
	  pieSliceText: 'none',
	  pieSliceBorderColor: '#00e046',
	  backgroundColor: 'none',
	  chartArea:{
		  height: '100%'
	  },
	  tooltip: { 
		  trigger: 'none' 
	  },
	  slices: {
		  0: { color: '#00e046' },
		  1: { color: '#ffffff' }
	}
};

  var chart = new google.visualization.PieChart(document.getElementById('visitorsChart'));
  chart.draw(data, options);
}
// daycycle
var day = 1;
	function dayEvent(){
		day++;
		if(day > 4){
			day=1;
		}
		else{
			showDayevents('day'+day+'event');
		}
	};
	var dayEventCycle = setInterval(dayEvent, 5000);