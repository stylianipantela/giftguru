'use strict';

/* Services */


// Demonstrate how to register services
// In this case it is a simple value service.
angular.module('myApp.services', [])

// referred to http://plnkr.co/edit/NAPFuwrUylcyUjejWm6N?p=preview  
// .service('facebook', ['$rootScope', '$window', function ($rootScope, $window) {

//   this.askFacebookForAuthentication = function (fail, success) {
//     FB.login(function (response) {
//       $rootScope.$apply(function () {
//         if (response.authResponse) {
//           FB.api('/me', success);
//         } else {
//           fail('User cancelled login or did not fully authorize.');
//         }
//       });
//     });
//   };

//   this.getLoginStatus = function () {
//     FB.getLoginStatus(function (response) {
//       return response;
//     });
//   };

//   this.FB = $window.FB;

// }])

// /* --------------- FB API MODELS ------------------ */
// .service('FBUser', ['$log', '$rootScope', 'facebook', function ($log, $rootScope, facebook) {
//   var that = this;

//   this.authorized = false;

//   facebook.FB.Event.subscribe('auth.authResponseChange', function (response) {
//     $log.info("Event: auth.authResponseChange");
//     if (response.authResponse) {
//       if (response.status === 'connected') {
//         // User logged in and authorized
//         $log.info('User logged in and authorized');
//         $rootScope.$apply(function () {
//           that.authorized = true;
//         });
//         // DO WORK
//       } else if (response.status === 'not_authorized') {
//         // User logged in but has not authorized app
//         $log.info('User logged in');
//         $rootScope.$apply(function () {
//           that.authorized = false;
//         });
//       } else {
//         // User logged out
//         $log.info('User logged out');
//         $rootScope.$apply(function () {
//           that.authorized = false;
//         });
//       }
//     } else {
//       $log.info('No valid authResponse found, user logged out');
//       $rootScope.$apply(function () {
//         that.authorized = false;
//       });
//     }
//     });

//   this.login = function (success, fail) {
//     facebook.FB.login(function (response) {
//       $rootScope.$apply(function () {
//         if (response.authResponse) {
//           success(response);
//         } else {
//           fail('Login unsuccessful');
//         }
//       });
//     }, {scope: 'email,user_likes,friends_birthday,friends_likes'});
//   };

//   this.logout = function () {
//     facebook.FB.logout(function () {
//       $rootScope.$apply(function () {
//         that.authorized = false;
//       });
//     });
//   };

//   /**
//    * me 
//    */
//    this.me = function() {
//      facebook.FB.api('/me', function(response) {
//        /**
//         * Using $scope.$apply since this happens outside angular framework.
//         */
//        $rootScope.$apply(function() {
//          that.me = response;
//        });
       
   
//      /*Facebook.api('/me/friends?fields=id,name,birthday', 
//        function(response) {
//          $scope.$apply(function() {
//            $scope.friends = response;
//        });
       
   
//      Facebook.api('/me/movies', 
//        function(response) {
//          $scope.$apply(function() {
//            $scope.movies = response;
//        });
       
   
//      FB.api('/me/permissions', function(r) {
//        console.log(r)
//      })*/
//    });
//  };
// }]);


