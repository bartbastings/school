<?php
$oefening = 4;

include('html_kop.inc.php');

echo "\n<h1>Opdracht $oefening</h1>\n";

echo "\n<h3>Een reisplanner</h3>\n";


/* make a php array of incoming information of the magento database and put them in variable $address */
$address = array(
	"1" => array("Address" => "282 Huaihai, Shanghai, China", "Name" => "La Brasserie"),
	"2" => array("Address" => "55 Anfu Lu, Shanghai, China", "Name" => "Enoterra Wine Bar Lounge & Boutique"),
	"3" => array("Address" => "39 Changle Lu, Shanghai, China", "Name" => "BLOC"),
	"4" => array("Address" => "535 Pudong Avenue, Shanghai, China", "Name" => "The Eton Hotel, Shanghai"),
	"5" => array("Address" => "1116 Hongsong lu, Shanghai, China", "Name" => "Hilton Shanghai Hongqiao"),
);
/* separate the venues of the array $address */
foreach($address as $Idx => $key){
	/* function for encoding a string that be used in a query part of a URL */
	$addr = urlencode($key['Address']);
	/* converting address into geographic coordinates and put it in the variable $url */
	$url = 'http://maps.google.com/maps/geo?q='.$addr.'&output=csv&sensor=false';
	/* read the contents of a file into a string of the variable $url and put it in the variable $get */
	$get = file_get_contents($url);
	/* returns an array of strings, each which is a substring wath is splitted by the "," caractere, from the variable $get and put it in the variable $records */
	$records = explode(",",$get);
	/* get the latitude of the variable $records */
	$lat = $records['2'];
	/* get the longitude of the variable $records */
	$lng = $records['3'];
	/* get the name from the variable $key */
	$name = $key['Name'];
	/* make a php array with the variables $lat, $lng and $name */
	$data[] = array('lat'=>$lat, 'lng'=>$lng, 'name'=>$name);	
}
/* change the php array $data into a json array */
$json = json_encode($data);
?>
<!-- 
The URL in the script tag is the location of the JavaScript file that loads all of the symbols and definitions you need for the Google Maps API.
application's API key: AIzaSyAVXgMgAx7tUpiR02EJsOl9OKCWu9vqddo / with the google api key you are authorized to use google maps api 3 services
sensor: true / indicates that this application uses a sensor (such as a GPS locator) to determine the user's location.  -->
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAnWDGbCPRgAnKiAh-j9sDWDap2ALfrlnc&sensor=false"></script>
<!-- open script -->
<script>
<!-- variable map -->
var map;
<!-- variable latLng -->
var latLng;
<!-- variable contentString -->
var contentString;
<!-- function initialize, function starts when section onload activated-->
function initialize(){
	<!-- if statement for the google map api navigator event, to search your location -->
    if (navigator.geolocation) {
		<!-- navigator event, get the position of the device -->
        navigator.geolocation.getCurrentPosition(function(position){
			<!-- variable latitude is the latitude coordinates -->
			var latitude = position.coords.latitude;
			<!-- variable longitude is the longitude coordinates -->
			var longitude = position.coords.longitude;
			<!-- variable accuracy, it's the accuracy of the coordinates of the position -->
			var accuracy = position.coords.accuracy;
			<!-- variable json, is the php json array -->
			var json = <?php print $json ?>;
			<!-- variable coords is the new google maps LatLng, the position where the user is -->
			var coords = new google.maps.LatLng(latitude, longitude);
			<!-- variable mapOptions, inside the mapoptions they're are the following options defined, the center position of the map, the zoom level of the map and the maptype -->
			var mapOptions = {
				center: coords,
				zoom: 12,
				mapTypeId: google.maps.MapTypeId.ROADMAP
			};
			<!-- the google maps comes in a html element with the id "map" -->
			map = new google.maps.Map(document.getElementById("map"), mapOptions);
			
			<!-- Creating a global infoWindow object that will be used by all markers, the info window gets a max width of 200px -->
			var infowindow = new google.maps.InfoWindow({
				maxWidth: 200
			});
			
			<!-- Looping through the JSON data -->
			for (var i = 0, length = json.length; i < length; i++) {
				<!-- variable data is the dato for each json element -->
				var data = json[i];
				<!-- variable latLng get the coordinates from data.lat and data.lng  -->
				latLng = new google.maps.LatLng(data.lat, data.lng);
				<!-- variable contentString contains a header element with the name of the venue and the section element has a short description and a link to the to venue page -->
				contentString ='<article>'+
				'<header>'+
				'<h1>'+ data.name +'</h1>'+
				'</header>'+
				'<section>'+
				'<p>'+ 'Globally productivate equity invested internal or "organic" sources rather than intermandated quality vectors. Seamlessly impact viral interfaces rather than unique architectures. number: '+ i +'</p>'+
				'<a href="'+'#'+'">Link</a>'+
				'</section>'+
				'</article>';
								
				<!-- Creating a marker and putting it on the map, the markers also contains a title with the name of the venue and the content of the variable contentString -->
				var marker = new google.maps.Marker({
					position: latLng,
					map: map,
					title: data.name,
					content: contentString
				});
				
				<!-- this is a event addListener, if you click a marker than you activate the following options. zoom to niveau 13, marker goes to the center of the map. the infowindow get the marker content, and open the infowindow if you click on the marker. And if you click on a another marker, the previous infowindow disappears. -->
				google.maps.event.addListener(marker, 'click', (function(marker, i) {
					return function() {
						map.setZoom(13);
						map.setCenter(marker.getPosition());
						infowindow.setContent(marker.content);
						infowindow.open(map, marker);	
					}
				})
				(marker, i));
			}

		});
	}
	<!-- if the navigator geolocation doesn't work then you get a alert -->
	else {
		alert("Geolocation API is not supported in your browser.");
	}
}
<!-- close script -->
</script>
<!-- open section with a onload, this activate the function "initialize()" when the browsers loads the section-->

<section onload="initialize()"> 
  <!-- Open div with the id "card" in this element comes the map -->
  <div id="map" style="height:400px; width:100%;"></div>
  <!-- close section --> 
</section>
<?php

include('html_staart.inc.php');
?>
