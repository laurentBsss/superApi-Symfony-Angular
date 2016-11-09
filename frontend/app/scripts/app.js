var app = angular.module("devTest2App", ['ngRoute']);


app.config(['$routeProvider',
  function($routeProvider) {
    $routeProvider.
      when('/home', {
        templateUrl: 'views/home.html', 
        controller: 'HomeCtrl'  
      }).
      when('/about', {
        templateUrl: 'views/about.html',
        controller: 'AboutCtrl'
      }).
      otherwise({
        redirectTo: '/home'
      });
}]);