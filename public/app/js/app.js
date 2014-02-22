'use strict';


// Declare app level module which depends on filters, and services
angular.module('myApp', [
  'ngRoute',
  'phonecatAnimations',
  //'facebookApp',
  'myApp.filters',
  'myApp.services',
  'myApp.directives',
  'myApp.controllers'
])
.config(['$routeProvider', function($routeProvider) {
  $routeProvider.when('/about', 
    {templateUrl: 'partials/about.html', controller: 'MainCtrl'});
  $routeProvider.when('/index/:user_id', 
    {templateUrl: 'partials/sideview.html', controller: 'MainCtrl'});
  $routeProvider.when('/myprofile', 
  	{templateUrl: 'partials/myprofile.html', controller: 'MyProfileCtrl'});
  $routeProvider.when('/friend', 
    {templateUrl: 'partials/friend.html', controller: 'RecResultCtrl'});
  $routeProvider.when('/friend/:user_id', 
    {templateUrl: 'partials/friend.html', controller: 'RecResultCtrl'});
  // $routeProvider.when('/facebook', 
  //   {templateUrl: 'partials/facebook.html', controller: 'FacebookCtrl'});
  $routeProvider.otherwise({redirectTo: '/myprofile'});
}]);