'use strict';

/* Controllers */

angular.module('myApp.controllers', []).
  controller('MyProfileCtrl', [function() {

  }])
  
  .controller('RecResultCtrl', ['$scope', '$routeParams', '$http', 
  	function($scope, $routeParams, $http){
  		$http.get('data/data.json').success(function(data) {
      	$scope.gifts = data;
      });
  	// TODO: check empty json
  }])

  .controller('FacebookCtrl', function ($scope) {
    $scope.phones = [
      {'name': 'Nexus S',
       'snippet': 'Fast just got faster with Nexus S.'},
      {'name': 'Motorola XOOM™ with Wi-Fi',
       'snippet': 'The Next, Next Generation tablet.'},
      {'name': 'MOTOROLA XOOM™',
       'snippet': 'The Next, Next Generation tablet.'}
    ];
  });