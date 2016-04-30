var app = angular.module("elofApp" , []);

	app.controller("elofcontroller", function ($scope,$http) {
		$scope.insertdata = function($sz_id, $osszeg){
			$http.post("fizetes.php",
				{'sz_id':$sz_id, 'osszeg':$osszeg}).success(function(data,status,headers,config){
					console.log("Sikeres beillesztes!");
				});
				alert("BANK válasza: ok!");
				location.reload();
		}
		});
