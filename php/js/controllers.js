app.controller('safeCtrl', ['$scope','$filter','$http', '$log', function($scope, $filter, $http, $log) {
	$scope.saferowCollection = [];
	$scope.options = {width: 800, height: 500, 'bar': 'aaa'};
	$http.get('popData.php?view=HOME')
			.success(function(data) {
				$scope.saferowCollection = data;
				
				$scope.data = data;
			})
			.error(function(err) {
				$log.error(err);
			})
	$scope.displayedCollection = [].concat($scope.saferowCollection);
}]);

app.controller('topFiveCtrl', ['$scope','$filter','$http', '$log', function($scope, $filter, $http, $log) {
	$scope.saferowCollection = [];
	$scope.options = {width: 900, height: 500, 'bar': 'aaa'};
	$scope.TopFivePerDate = function() {
		
		var picked_day = 27;
		var picked_month = 1; //Months are zero based
		var picked_year = 2013;
		var picked_date= picked_day + "/" + picked_month + "/" + picked_year;
		
		if ($scope.PickedDate){
			picked_day = $scope.PickedDate.getDate();
			picked_month = $scope.PickedDate.getMonth() + 1; //Months are zero based
			picked_year = $scope.PickedDate.getFullYear();
			picked_date = picked_day + "/" + picked_month + "/" + picked_year;
		}
		// use $.param jQuery function to serialize data from JSON 
		var param_data = $.param({'view':0, 'pickedDate':picked_date});
		
		var config = {
			headers : {
				'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'
			}
		}
		$http.post('popData.php',param_data, config)
				.success(function(data) {
					$scope.saferowCollection = data;
					$scope.data = data;
				})
				.error(function(err) {
					$log.error(err);
				});
		$scope.displayedCollection = [].concat($scope.saferowCollection);
	}
	$scope.TopFivePerDate();
}]);
