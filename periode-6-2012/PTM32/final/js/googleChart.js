// google load package
google.load("visualization", "1", {packages:["corechart"]});

// gender values
var man = 378;
var vrouw = 78;

//
google.setOnLoadCallback(drawGenderChartSpotlight1);
// values gender chart Spotlight1
var manSpotlight1 = 50;
var vrouwSpotlight1 = 400;
// function draw gender chart Spotlight1
function drawGenderChartSpotlight1() {
	var data = google.visualization.arrayToDataTable([
		['gender', 'number '],
		['Man', manSpotlight1],
		['Vrouw', vrouwSpotlight1]
	]);
	var options = {
		legend: 'none',
		pieSliceText: 'none',
		pieSliceBorderColor: '#00e046',
		backgroundColor: 'none',
		chartArea:{
			height: '100%'
		},
		tooltip: {
			trigger: 'none' 
		},
		slices: {
			0: { color: '#00e046' },
			1: { color: '#ffffff' }
		}
	};
	var chart = new google.visualization.PieChart(document.getElementById('genderChartSpotlight1'));
	chart.draw(data, options);
}

//
google.setOnLoadCallback(drawGenderChartSpotlight2);
// values gender chart Spotlight2
var manSpotlight2 = 225;
var vrouwSpotlight2 = 225;
// values gender chart Spotlight2
function drawGenderChartSpotlight2() {
	var data = google.visualization.arrayToDataTable([
		['gender', 'number '],
		['Man', manSpotlight2],
		['Vrouw', vrouwSpotlight2]
	]);
	var options = {
		legend: 'none',
		pieSliceText: 'none',
		pieSliceBorderColor: '#00e046',
		backgroundColor: 'none',
		chartArea:{
			height: '100%'
		},
		tooltip: {
			trigger: 'none' 
		},
		slices: {
			0: { color: '#00e046' },
			1: { color: '#ffffff' }
		}
	};
	var chart = new google.visualization.PieChart(document.getElementById('genderChartSpotlight2'));
	chart.draw(data, options);
}

//
google.setOnLoadCallback(drawGenderChartSpotlight3);
// values gender chart Spotlight3
var manSpotlight3= 400;
var vrouwSpotlight3 = 50;
// values gender chart Spotlight3
function drawGenderChartSpotlight3() {
	var data = google.visualization.arrayToDataTable([
		['gender', 'number '],
		['Man', man],
		['Vrouw', vrouw]
	]);
	var options = {
		legend: 'none',
		pieSliceText: 'none',
		pieSliceBorderColor: '#00e046',
		backgroundColor: 'none',
		chartArea:{
			height: '100%'
		},
		tooltip: {
			trigger: 'none' 
		},
		slices: {
			0: { color: '#00e046' },
			1: { color: '#ffffff' }
		}
	};
	var chart = new google.visualization.PieChart(document.getElementById('genderChartSpotlight3'));
	chart.draw(data, options);
}

// visitors values
var total = 300;
var visitors = 156;

//
google.setOnLoadCallback(drawVisitorsChartSpotlight1);
// values visitors chart Spotlight1
var totalSpotlight1 = 100;
var visitorsSpotlight1 = 250;
// function draw visitors chart
function drawVisitorsChartSpotlight1() {
	var data = google.visualization.arrayToDataTable([
		['value', 'number '],
		['', totalSpotlight1],
		['', visitorsSpotlight1]
	]);
	var options = {
		legend: 'none',
		pieSliceText: 'none',
		pieSliceBorderColor: '#00e046',
		backgroundColor: 'none',
		chartArea:{
			height: '100%'
		},
		tooltip: {
			trigger: 'none' 
		},
		slices: {
			0: { color: '#00e046' },
			1: { color: '#ffffff' }
		}
	};
	var chart = new google.visualization.PieChart(document.getElementById('visitorsChartSpotlight1'));
	chart.draw(data, options);
}

//
google.setOnLoadCallback(drawVisitorsChartSpotlight2);
// values visitors chart Spotlight2
var totalSpotlight2 = 180;
var visitorsSpotlight2 = 270;
// function draw visitors chart
function drawVisitorsChartSpotlight2() {
	var data = google.visualization.arrayToDataTable([
		['value', 'number '],
		['', totalSpotlight2],
		['', visitorsSpotlight2]
	]);
	var options = {
		legend: 'none',
		pieSliceText: 'none',
		pieSliceBorderColor: '#00e046',
		backgroundColor: 'none',
		chartArea:{
			height: '100%'
		},
		tooltip: {
			trigger: 'none' 
		},
		slices: {
			0: { color: '#00e046' },
			1: { color: '#ffffff' }
		}
	};
	var chart = new google.visualization.PieChart(document.getElementById('visitorsChartSpotlight2'));
	chart.draw(data, options);
}

//
google.setOnLoadCallback(drawVisitorsChartSpotlight3);
// values visitors chart Spotlight2
var totalSpotlight3 = 330;
var visitorsSpotlight3 = 120;
// function draw visitors chart
function drawVisitorsChartSpotlight3() {
	var data = google.visualization.arrayToDataTable([
		['value', 'number '],
		['', totalSpotlight3],
		['', visitorsSpotlight3]
	]);
	var options = {
		legend: 'none',
		pieSliceText: 'none',
		pieSliceBorderColor: '#00e046',
		backgroundColor: 'none',
		chartArea:{
			height: '100%'
		},
		tooltip: {
			trigger: 'none' 
		},
		slices: {
			0: { color: '#00e046' },
			1: { color: '#ffffff' }
		}
	};
	var chart = new google.visualization.PieChart(document.getElementById('visitorsChartSpotlight3'));
	chart.draw(data, options);
}