'use strict';

var app = angular.module('myApp', [
  'ngRoute',
  //'facebookApp',
  'myApp.filters',
  'myApp.services',
  'myApp.directives',
  'myApp.controllers'

]);

// Initialize the facebook javascript SDK
app.run(['$rootScope', '$location', '$window', 'FacebookService', 
  function($rootScope, $location, $window, Facebook) {
  $rootScope.user = {};

  $window.fbAsyncInit = function() {
    // Executed when the SDK is loaded

    FB.init({ 
      appId: '406850762664477', 
      channelUrl: '/app/partials/channel.html', 
      status: true, 
      cookie: true, 
      xfbml: true 
    });

    Facebook.watchLoginChange();
  };

  // Are you familiar to IIFE ( http://bit.ly/iifewdb ) ?

  (function(d){
    // load the Facebook javascript SDK

    var js, 
    id = 'facebook-jssdk', 
    ref = d.getElementsByTagName('script')[0];

    if (d.getElementById(id)) {
      return;
    }

    js = d.createElement('script'); 
    js.id = id; 
    js.async = true;
    js.src = "//connect.facebook.net/en_US/all.js";

    ref.parentNode.insertBefore(js, ref);

  }(document));

}]);



// Declare app level module which depends on filters, and services
app.config(['$routeProvider', function($routeProvider) {
  // $routeProvider.when('/about', 
  //   {templateUrl: 'partials/about.html', controller: 'MainCtrl'});
  // $routeProvider.when('/index/:user_id', 
  //   {templateUrl: 'partials/sideview.html', controller: 'MainCtrl'});
  // $routeProvider.when('/friend', 
  //   {templateUrl: 'partials/friend.html', controller: 'RecResultCtrl'});
  // $routeProvider.when('/friend/:user_id', 
  //   {templateUrl: 'partials/friend.html'
  //   ,controller: 'RecResultCtrl'
  //   ,access: { isFree: true }
  //   });
  $routeProvider.when('/myprofile', 
  	{templateUrl: 'partials/myprofile.html'
    ,controller: 'MyProfileCtrl'
    ,access: { isFree: true }
  });
  $routeProvider.when('/login', 
    {templateUrl: 'partials/login.html'
    ,controller: 'FcbCtrl'
    ,access: { isFree: true }
    });

  

  $routeProvider.otherwise({redirectTo: '/login'});
}]);


