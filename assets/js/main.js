var app = angular.module("profileApp" , []);
//var app2 = angular.module("kedvencApp", []);
	
	app.controller("ertekelescontroller", function ($scope,$http) {
		$scope.insertdata = function($f_id){
			$http.post("ertekeles.php",
				{'pont':$scope.pont, 'szoveg':$scope.szoveg, 'f_id':$f_id}).success(function(data,status,headers,config){
					console.log("Sikeres beillesztes!");
				});
				alert("Köszönjük az értékelését!");
				location.reload();
		}

		$scope.deletedata =function($e_id){
			$http.post("delertekeles.php" , {'e_id':$e_id}).success(function(data,status,headers,config){
				consol.log("Sikeres értékelés törlés!");
			});
			alert("Sikeres törlés!")
			location.reload();
		}

		$scope.selectdata = function($sz_id){
			var url1 = "e_lekerdez.php?sz_id=";
			var url2 = $sz_id
			var egesz = url1.concat(url2);
			$http.get(egesz).then(function (response) {$scope.ertekelesek = response.data.records;});
		}
		});


