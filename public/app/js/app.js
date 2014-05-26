'use strict';

var app = angular.module('myApp', [
  'ngRoute',
  //'facebookApp',
  'myApp.filters',
  'myApp.services',
  'myApp.directives',
  'myApp.controllers'

]);

// app.run(['$rootScope', '$window', 'srvAuth', 
//   function($rootScope, $window, sAuth) {
//   $rootScope.user = {};

//   $window.fbAsyncInit = function() {
//     // Executed when the SDK is loaded

//     FB.init({ 
//       appId: '406850762664477', 
//       channelUrl: '/app/partials/channel.html', 
//       status: true, 
//       cookie: true, 
//       xfbml: true 
//     });

//     // sAuth.watchLoginChange();

//   };

//   // Are you familiar to IIFE ( http://bit.ly/iifewdb ) ?

//   (function(d){
//     // load the Facebook javascript SDK

//     var js, 
//     id = 'facebook-jssdk', 
//     ref = d.getElementsByTagName('script')[0];

//     if (d.getElementById(id)) {
//       return;
//     }

//     js = d.createElement('script'); 
//     js.id = id; 
//     js.async = true;
//     js.src = "//connect.facebook.net/en_US/all.js";

//     ref.parentNode.insertBefore(js, ref);

//   }(document));

// }]);



// Declare app level module which depends on filters, and services
app.config(['$routeProvider', function($routeProvider) {
  $routeProvider.when('/about', 
    {templateUrl: 'partials/about.html', controller: 'MainCtrl'});
  // this is my dashboard
  $routeProvider.when('/index/:user_id', 
    {templateUrl: 'partials/sideview.html', controller: 'MainCtrl'});
  $routeProvider.when('/myprofile', 
  	{templateUrl: 'partials/myprofile.html', controller: 'MyProfileCtrl'});
  $routeProvider.when('/friend', 
    {templateUrl: 'partials/friend.html', controller: 'RecResultCtrl'});
  $routeProvider.when('/friend/:user_id', 
    {templateUrl: 'partials/friend.html', controller: 'RecResultCtrl'});
  $routeProvider.when('/fcb', 
    {templateUrl: 'partials/fcb.html', controller: 'FcbCtrl'});
  // $routeProvider.when('/facebook', 
  //   {templateUrl: 'partials/facebook.html', controller: 'FacebookCtrl'});
  $routeProvider.otherwise({redirectTo: '/index/11'});
}]);