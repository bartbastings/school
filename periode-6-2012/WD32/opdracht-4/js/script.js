google.load("visualization", "1", {packages:["corechart"]});
google.setOnLoadCallback(drawColumnChart);
google.setOnLoadCallback(drawBarChart);

function drawColumnChart() {
  var dataTable = new google.visualization.DataTable();
  dataTable.addColumn('string', 'Year');
  dataTable.addColumn('number', 'Sales');
  dataTable.addRows([
    ['1999', 1074.44],
    ['2000', 1095.89],
    ['2001', 1117.88],
    ['2002', 1140.24],
	['2003', 1163.02],
    ['2004', 1186.31],
    ['2005', 1210],
    ['2006', 1234],
	['2007', 1259],
    ['2008', 1309.6],
    ['2009', 1387.5],
    ['2010', 1387.5],
	['2011', 1415.24]
  ]);
  var options = {
	  legend: 'none',
	  title: 'Land: FH TNW'
	};
  var chart = new google.visualization.ColumnChart(document.getElementById('columnChart'));
  chart.draw(dataTable, options);
}

function drawBarChart() {
	var dataTable = new google.visualization.DataTable();
  dataTable.addColumn('string', 'Year');
  dataTable.addColumn('number', 'Sales');
  dataTable.addRows([
    ['1999', 1074.44],
    ['2000', 1095.89],
    ['2001', 1117.88],
    ['2002', 1140.24],
	['2003', 1163.02],
    ['2004', 1186.31],
    ['2005', 1210],
    ['2006', 1234],
	['2007', 1259],
    ['2008', 1309.6],
    ['2009', 1387.5],
    ['2010', 1387.5],
	['2011', 1415.24]
  ]);
  var options = {
	  legend: 'none',
	  title: 'Land: FH TNW'
	};
  var chart = new google.visualization.BarChart(document.getElementById('barChart'));
  chart.draw(dataTable, options);
}

var jsonUrl = 'js/ajax/dataverkeer.json';

function createJson(){
	var JsonData = $.ajax({
		type: 'GET',
		url: jsonUrl,
		cache: false,
		success: function(data){
			console.log(data);
		},
		error: function(){
			console.log('error createJson');
		}
	});
};

/*
createJson();

google.load('visualization', '1', {'packages':['corechart']});

google.setOnLoadCallback(drawChart);

function drawChart(){
	var jsonData = $.ajax({
		type: 'GET',
		url: jsonUrl,
		cache: false,
		async:false,
		dataType: 'json'}).responseText;
	
	var data = new google.visualization.DataTable(jsonData);
	
	var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
	chart.draw(data, { width: 400, height: 240 });
};
*/