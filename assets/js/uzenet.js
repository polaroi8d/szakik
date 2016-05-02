var app = angular.module("uzenetApp", []);

app.controller("uzenetcontroller", function($scope,$http) {
	$scope.insertdata = function($h_id,$from_id,$to_id) {

		$http.post("uzenetkuldes.php" , {'h_id':$h_id, 'from_id':$from_id, 'to_id':$to_id, 'uzenet':$scope.uzenet}).success(function(data,status,headers,config){
			console.log("Sikeres üzenetküldés!");
			location.reload();
		});

	}
});