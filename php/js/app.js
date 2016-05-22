var app = angular.module('manulifeApp', ['ngRoute','smart-table', 'ui.bootstrap','d3']);

app.config(function($routeProvider) {
	$routeProvider
	.when('/', {
		templateUrl: '/templates/home.html'
	})
	.when('/TopFive', {
		templateUrl: 'templates/TopFive.html',
		controller: 'topFiveCtrl'
	})
	.when('/detailList', {
		templateUrl: 'templates/detailList.html',
		controller: 'safeCtrl'
	})	
	.otherwise({
		templateUrl: 'templates/404.html'
	})
});



