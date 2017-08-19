$(document).ready(function() {
	
	var width = $(window).width();
	
	if(width > 1600){
		
		$("#menukaart").booklet({
			width:  '100%',
			height: '645',
			autoCenter: true
		});
	}
	else if(width > 1440 && width <= 1600){
		
		$("#menukaart").booklet({
			width:  '100%',
			height: '757.5',
			autoCenter: true
		});
	}
	else if(width > 1024 && width <= 1440){
		
		$("#menukaart").booklet({
			width:  '100%',
			height: '680.5',
			autoCenter: true
		});
	}
	else if(width > 768 && width <= 1024){
		
		$("#menukaart").booklet({
			width:  '100%',
			height: '476',
			autoCenter: true
		});
	}
	else if(width > 321 && width <= 768){
		
		$("#menukaart").booklet({
			width:  '100%',
			height: '458',
			autoCenter: true
		});
	}
	else{
	}
});