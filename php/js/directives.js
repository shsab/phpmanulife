(function (ng) {
	app.directive('barChart', function(){
		return {
			restrict: 'E',
			replace: true,
			template: '<div class="chart"></div>',
			scope:{
				height: '=height',
				data: '=data',
			},
			link: function(scope, element, attrs) {
				var chart = new d3.custom.barChart();
				var chartEl = d3.select(element[0]);
				scope.$watch('data', function (newVal) {
					chartEl.datum(newVal).call(chart);
				});

				scope.$watch('height', function(d, i){
					chartEl.call(chart.height(scope.height));
				})
			}
		}
	});
		
	app.directive('shDatePicker', ['$timeout', function ($timeout) {
		return {
			restrict: 'E',
			templateUrl: './templates/tmpDatePicker.html',

			link: function (scope, element, attr, table) {

				var inputs = element.find('input');
				var inputDate = ng.element(inputs[0]);
				var predicateName = attr.predicate;


				[inputDate].forEach(function (input) {

					input.bind('blur', function () {

						var query = {};

						if (!scope.isDatePickerOpen) {
							if (scope.PickedDate) {
								query.PickedDate = scope.PickedDate;
							}
						}
					});
				});

				function open(DatePicker) {
					return function ($event) {
						$event.preventDefault();
						$event.stopPropagation();

						if (DatePicker) {
							scope.isDatePickerOpen = true;
						}else{
							scope.isDatePickerOpen = false;
						}
					}
				}

				scope.openDatePicker = open(true);
			}
		}
	}]);
	
	app.directive('stDateRange', ['$timeout', function ($timeout) {
		return {
			restrict: 'E',
			require: '^stTable',
			scope: {
				PickedDate: '='
			},
			templateUrl: './templates/tmpDatePicker.html',

			link: function (scope, element, attr, table) {

				var inputs = element.find('input');
				var inputDate = ng.element(inputs[0]);
				var predicateName = attr.predicate;


				[inputDate].forEach(function (input) {

					input.bind('blur', function () {

						var query = {};

						if (!scope.isDatePickerOpen) {
							if (scope.PickedDate) {
								query.PickedDate = scope.PickedDate;
							}
							scope.$apply(function () {
								table.search(query, predicateName);
							})
						}
					});
				});

				function open(DatePicker) {
					return function ($event) {
						$event.preventDefault();
						$event.stopPropagation();

						if (DatePicker) {
							scope.isDatePickerOpen = true;
						}else{
							scope.isDatePickerOpen = false;
						}
					}
				}

				scope.openDatePicker = open(true);
			}
		}
	}]);
	
})(angular);