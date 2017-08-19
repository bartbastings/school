var jsonUrl = 'js/ajax/wifi_data.json';
$.ajax({
	type: 'GET',
	url: jsonUrl,
	cache: false,
	dataType: 'json',
	success: function(data){
		console.log('succes ajax');
		console.log(data);
		$.each( data, function( key, value ) {
			$('#json-list').append('<li><h4>'+value[0]+' '+value[1]+'</h4><div><div class="'+value[4]+' bar" style="width:'+value[5]+';"><span>afdeling: '+value[3]+'</span></div></div></li>');
			$('#json-list-2').append('<li><div class="bubble"></div><p class="text">'+value[2]+' MB per jaar</p></li>');
		});
	},
	error: function(){
		console.log('error ajax');
	}
});

