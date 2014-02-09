'use strict';

/* Controllers */
angular.module('myApp.controllers', []).
  controller('MyProfileCtrl', [function() {

  }])
  
  .controller('RecResultCtrl', ['$scope', '$routeParams', '$http', 

  	function($scope, $routeParams, $http){
      window.jsonp_callback = function(data) {
        $scope.gifts = data.results;
      }
  		$http.jsonp('http://giftguruapi.herokuapp.com/products/nutella/jsonp_callback');
  // TODO: check empty json
  }])
  .controller('FacebookCtrl', function ($scope) {
    
  });
