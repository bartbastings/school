window.onload = function() {
	
	var video = document.getElementById('video')[0];
	var playpause = document.getElementById('playpause');
	var mutebutton = document.getElementById('mutebutton');
	var volumecontrol = document.getElementById('volumecontrol');
	var ratecontrol = document.getElementById('ratecontrol');
	
	video.onpause = function play(e) {
		playpause.value = 'Play';
		playpause.onclick = function(e) { video.play();
		}
	}
	video.onplay = function pause(e) {
		playpause.value = 'Pause';
		playpause.onclick = function(e) { video.pause();
		}
	}
	video.onvolumechange = function volume(e) {
		mutebutton.value = video.muted ? 'Muted' : 'Unmuted';
	}
	function muteOrUnmute() {
		video.muted = !video.muted;
	}
	video.onvolumechange = function(e) {
		mutebutton.value = video.muted ? 'Muted' : 'Unmuted';
		volumecontrol.value = video.volume;
	}
	function updateVolume() {
		video.volume = volumecontrol.value;
	}
	video.onratechange = function(e) {
		ratecontrol.value = video.playbackRate;
	}
	function changePlaybackRate() {
		video.playbackRate = ratecontrol.value;
	}
}