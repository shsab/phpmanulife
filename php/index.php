<!DOCTYPE html>
<html lang="en" data-ng-app="manulifeApp">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>ManuLife Assignment - Shahram</title>
	<!-- Use CDNs for start. Latter convert to local copy -->
	<script type="text/javascript" src="http://d3js.org/d3.v3.min.js"></script> 
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.7/angular.min.js"></script> 
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.7/angular-route.js"></script> 
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/angular-smart-table/2.1.8/smart-table.min.js" crossorigin="anonymous"></script>
	<script data-require="ui-bootstrap@0.11.0" data-semver="0.11.0" src="http://angular-ui.github.io/bootstrap/ui-bootstrap-tpls-0.11.0.min.js"></script>
	<script src="./js/barChart.js"></script>
	<script src="./js/factories.js"></script>
	<script src="./js/app.js"></script>
	<script src="./js/controllers.js"></script>
	<script src="./js/directives.js"></script>
	<script src="./js/filters.js"></script>
	<style>
		body{
				font: 14px sans-serif;
			}
			.axis path, .axis line {
				fill: none;
				stroke: black;
				shape-rendering: crispEdges;
			}
			.axis path{
				fill: none;
				stroke: none;
			}
			.y.axis line {
				stroke: #fff;
				stroke-opacity: .2;
				shape-rendering: crispEdges;
			}

			.y.axis .zero line {
				stroke: #000;
				stroke-opacity: 1;
			}
			.bar {
				fill: steelblue;
			}	
			.chart {
				width:1200px; 
				margin:0 auto;
			}
			#instruction-text{
				width: 60%;
				padding-left: 125px;
			}
			.DatePicker {
				width: 20%;
			}
	</style>
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">ManuLife</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="#/">Home</a></li>
        <li><a href="#TopFive">Top Five per day</a></li>
        <li><a href="#detailList">Detail</a></li>
      </ul>
    </div>
  </div>
</nav>
	<div ng-view></div>
</body>
</html>
