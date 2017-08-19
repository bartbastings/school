$(document).ready(function() {
    
	if($(window).width() > 768 ){
		var imgWidth = $(".logo").width();
		var imgWidth = imgWidth/1.5;
		$(".logo").css({"height": imgWidth+'px'});
	}
	var logoLink = $(".logoLink").width();
	var logoLink = logoLink/1.5;
	$(".logoLink").css({"height": logoLink+'px'});
	
	var homeSectionWidth = $(".homeSection").width();
	var homeSectionWidth = homeSectionWidth/1.5;
	$(".homeSection").css({"height": homeSectionWidth+'px'});
	
	var mainHeight = $(window).height();
	mainHeight = mainHeight-100;
	$(".contactSection").css({"height": mainHeight+'px'});
});

$(window).resize(function(){
	var imgWidth = $(".logo").width();
	var imgWidth = imgWidth/1.5;
	$(".logo").css({"height": imgWidth+'px'});
	
	var logoLink = $(".logoLink").width();
	var logoLink = logoLink/1.5;
	$(".logoLink").css({"height": logoLink+'px'});
	
	var homeSectionWidth = $(".homeSection").width();
	var homeSectionWidth = homeSectionWidth/1.5;
	$(".homeSection").css({"height": homeSectionWidth+'px'});
});

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
	
	var map = new google.maps.Map(document.getElementById("map-canvas"),mapOptions);
	
	var contentString = "<div class='infoWindow'><h2>ZUSS Brasserie & Meenemen</h2><p>Adres: D'n Entrepot 8, 5831 DE Boxmeer</p><p>Email: <a href='mailto:info@zussbrasserie.nl'>info@zussbrasserie.nl</a></p><p>Tel: (0485) 57 80 60</p></div>";

  var infowindow = new google.maps.InfoWindow({
      content: contentString
  });
	
	var image = 'afb/marker-Zuss.png';
	
	var marker = new google.maps.Marker({
		position: latLng,
		map: map,
		icon: image
	});
	
	google.maps.event.addListener(marker, 'click', function() {
		infowindow.open(map,marker);
	});
};

google.maps.event.addDomListener(window, 'load', initialize);