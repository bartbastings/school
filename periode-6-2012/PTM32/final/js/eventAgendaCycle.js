// show dayevents
function showDayevents(eventday){
	switch (eventday){
		case "day1event":	
			$(".day1event").fadeIn('slow');
			$(".day2event").hide();
			$(".day3event").hide();
			$(".day4event").hide();
			$("#day1").css("color","#00e046");
			$("#day2").css("color","#21262D");
			$("#day3").css("color","#21262D");
			$("#day4").css("color","#21262D");
		break;
		case "day2event":
			$(".day1event").hide();
			$(".day2event").fadeIn('slow');
			$(".day3event").hide();
			$(".day4event").hide();
			$("#day1").css("color","#21262D");
			$("#day2").css("color","#00e046");
			$("#day3").css("color","#21262D");
			$("#day4").css("color","#21262D");
		break;
		case "day3event":
			$(".day1event").hide();
			$(".day2event").hide();
			$(".day3event").fadeIn('slow');
			$(".day4event").hide();
			$("#day1").css("color","#21262D");
			$("#day2").css("color","#21262D");
			$("#day3").css("color","#00e046");
			$("#day4").css("color","#21262D");
		break;
		case "day4event":
			$(".day1event").hide();
			$(".day2event").hide();
			$(".day3event").hide();
			$(".day4event").fadeIn('slow');
			$("#day1").css("color","#21262D");
			$("#day2").css("color","#21262D");
			$("#day3").css("color","#21262D");
			$("#day4").css("color","#00e046");
		break;
		default:
			alert("showDayevents error");
		break;
    }
}
//
var dayNumber = 0;
function dayEvent(){
	dayNumber ++;
	switch (dayNumber){
		case 1:
			showDayevents('day1event');
		break;
		case 2:
			showDayevents('day2event');
		break;
		case 3:
			showDayevents('day3event');
		break;
		case 4:
			showDayevents('day4event');
			dayNumber = 0;
		break;
		default:
			alert("screenNumber error");
		break;
	}
};
//
function dayEventCycle(time){
	setInterval(dayEvent, time);
}