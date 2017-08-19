//
function mainScreenHideShow(divClass){
	switch (divClass){
		case 1:	
			$(".first").show();
			$(".second").hide();
		break;
		case 2:
			$(".first").hide();
			$(".second").show();
		break;
		default:
			alert("mainScreenHideShow error");
		break;
	}
};
//
var screenNumber = 0;
function mainScreenRolation(){
	screenNumber ++;
	switch (screenNumber){
		case 1:
			mainScreenHideShow(1);
		break;
		case 2:
			screenNumber = 0;
			mainScreenHideShow(2);
		break;
		default:
			alert("screenNumber error");
		break;
	}
};
//
function screenCycle(){
	setInterval(mainScreenRolation, 10000);
}