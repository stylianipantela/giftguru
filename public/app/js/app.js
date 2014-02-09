'use strict';


// Declare app level module which depends on filters, and services
angular.module('myApp', [
  'ngRoute',
  'phonecatAnimations',
  'facebookApp',
  'myApp.filters',
  'myApp.services',
  'myApp.directives',
  'myApp.controllers'
]).
config(['$routeProvider', function($routeProvider) {
  $routeProvider.when('/myprofile', 
  	{templateUrl: 'partials/myprofile.html', controller: 'MyProfileCtrl'});
  $routeProvider.when('/friend', 
  	{templateUrl: 'partials/friend.html', controller: 'RecResultCtrl'});
  $routeProvider.when('/facebook', 
    {templateUrl: 'partials/facebook.html', controller: 'FacebookCtrl'});
  $routeProvider.otherwise({redirectTo: '/myprofile'});
}]);
