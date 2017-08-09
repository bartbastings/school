// JavaScript Document

window.onload = function () {
	
	var canvas = document.getElementById("myCanvas");
	var context = canvas.getContext("2d");
	
	for (var y = 100; y < 500; y += 100) {
		context.moveTo(100, y);
		context.lineTo(500, y);
		context.strokeStyle = "#00f";
		context.stroke();
	}
};
