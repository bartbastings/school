$(document).ready(function(){
	
	var dd = $('.twitterFeed').easyTicker({
		direction: 'up',
		easing: 'easeInOutBack',
		speed: 'slow',
		interval: 5000,
		height: 'auto',
		visible: 1,
		mousePause: 0,
		controls: {
			up: '.up',
			down: '.down',
			toggle: '.toggle',
			stopText: 'Stop !!!'
		}
	}).data('easyTicker');
	
	$('#fade').cycle({ 
    fx:     'fade', 
    speed:   1000, 
    timeout: 6000, 
    next:   '#fade', 
    pause:   1 
	});
});