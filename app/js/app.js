'use strict';


// Declare app level module which depends on filters, and services
angular.module('myApp', [
  'ngRoute',
  'myApp.filters',
  'myApp.services',
  'myApp.directives',
  'myApp.controllers'
]).
config(['$routeProvider', function($routeProvider) {
  $routeProvider.when('/view1', 
  	{templateUrl: 'partials/partial1.html', controller: 'MyCtrl1'});
  $routeProvider.when('/view2', 
  	{templateUrl: 'partials/partial2.html', controller: 'MyCtrl2'});
  $routeProvider.when('/myprofile', 
  	{templateUrl: 'partials/myprofile.html', controller: 'MyProfileCtrl'});
  $routeProvider.when('/friend', 
  	{templateUrl: 'partials/friend.html', controller: 'RecResultCtrl'});
  $routeProvider.otherwise({redirectTo: '/myprofile'});
}]);
