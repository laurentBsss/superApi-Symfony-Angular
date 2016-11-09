app.controller('SearchCtrl', ['$scope','$http', function($scope,$http) {
	$scope.query="";
	/*console.log('successs 1' );*/
	$scope.search = function()
            {
            	console.log('successs 2' );

            	if ($scope.query.length >= 1) { 

            		$http.get('http://dev.test.com/app_dev.php/weather/'+$scope.query ).success(function(data) {
                    /* console.log('success');*/
                    $scope.meteo = data;
                    console.log($scope.meteo );

                    });
                }
            };

} ] 
);
