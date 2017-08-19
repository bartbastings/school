function initialize() {
	var latLng = new google.maps.LatLng(51.647239, 5.947830)
	
	var mapOptions = {
		center: latLng,
		zoom: 15,
		styles: [
			{featureType:"landscape",
			stylers:[
				{saturation:-100},
				{lightness:65},
				{visibility:"on"}]},
			{featureType:"poi",
			stylers:[
				{saturation:-100},
				{lightness:51},
				{visibility:"simplified"}]},
			{featureType:"road.highway",
			stylers:[
				{saturation:-100},
				{visibility:"simplified"}]},
			{featureType:"road.arterial",
			stylers:[
				{saturation:-100},
				{lightness:30},
				{visibility:"on"}]},
			{featureType:"road.local",
			stylers:[
				{saturation:-100},
				{lightness:40},
				{visibility:"on"}]},
			{featureType:"transit",
			stylers:[
				{saturation:-100},
				{visibility:"simplified"}]},
			{featureType:"administrative.province",
			stylers:[
				{visibility:"off"}]},
			{featureType:"administrative.locality",
			stylers:[
				{visibility:"off"}]},
			{featureType:"administrative.neighborhood",
			stylers:[
				{visibility:"on"}]},
			{featureType:"water",
			elementType:"labels",
			stylers:[
				{visibility:"on"},
				{lightness:-25},
				{saturation:-100}]},
			{featureType:"water",
			elementType:"geometry",
			stylers:[
				{hue:"#ffff00"},
				{lightness:-25},
				{saturation:-97}]
			}]
		};
	
	var map = new google.maps.Map(document.getElementById("map"),mapOptions);
	
	var image = 'afb/marker-Zuss.png';
	
	var marker = new google.maps.Marker({
		position: latLng,
		map: map,
		icon: image
	});
};

google.maps.event.addDomListener(window, 'load', initialize);