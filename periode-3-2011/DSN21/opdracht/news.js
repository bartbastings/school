// JavaScript Document

var slideShowSpeed = 5000

var crossFadeDuration = 3

var Pic = new Array()
Pic[0] = 'laag 1.png'
Pic[1] = 'laag 2.png'
Pic[2] = 'laag 3.png'

var t
var j = 0
var p = Pic.length

var preLoad = new Array()
for (i = 0; i < p; i++) {
	preLoad[i] = new Image()
	preLoad[i].src = Pic[i]
}

function runSlideShow() {
	if (document.all) {
		document.images.SlideShow.style.filter = "blendTrans(duration=2)"
		document.images.SlideShow.style.filter = "blendTrans(duration=crossFadeDuration)"
		document.images.SlideShow.filters.blendTrans.Apply()
	}
	document.images.SlideShow.src = preLoad[j].src
	if (document.all) {
		document.images.SlideShow.filters.blendTrans.Play()
	}
	j = j + 1
	if (j > (p - 1)) j = 0
	t = setTimeout('runSlideShow()', slideShowSpeed)
}
