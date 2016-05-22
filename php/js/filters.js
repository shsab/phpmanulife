(function (ng) {
	app.filter('customFilter', ['$filter', function ($filter) {
				var filterFilter = $filter('filter');
				var standardComparator = function standardComparator(obj, text) {
					text = ('' + text).toLowerCase();
					return ('' + obj).toLowerCase().indexOf(text) > -1;
				};

				return function customFilter(array, expression) {
					function customComparator(actual, expected) {
						
						var itemDate;
						var queryDate;

						if (ng.isObject(expected)) {
							if (expected.PickedDate) {
								try {
									itemDate = new Date(actual);
									queryDate = new Date(expected.PickedDate);

									if (itemDate.toDateString() != queryDate.toDateString()) {
										return false;
									}
									return true;
								} catch (e) {
									return false;
								}
							}
						}
						return standardComparator(actual, expected);
					}
					var output = filterFilter(array, expression, customComparator);
					return output;
				};
			}]);
})(angular);