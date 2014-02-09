'use strict';

/* Controllers */
function jsonp_callback2 (data) {
    // returning from async callbacks is (generally) meaningless
    console.log(data);
}

angular.module('myApp.controllers', []).
  controller('MyCtrl1', [function() {
  }])
  .controller('MyProfileCtrl', [function() {

  }])
  .controller('RecResultCtrl', ['$scope', '$routeParams', '$http', 

  	function($scope, $routeParams, $http){
      window.jsonp_callback = function(data) {
        $scope.gifts = data.results;
      }
  		$http.jsonp('http://giftguruapi.herokuapp.com/products/nutella/jsonp_callback').success(function(data) {
        console.log("hello");
      });
      }])
  .controller('MyCtrl2', [function() {  		
  }]);

  // 'http://giftguruapi.herokuapp.com/products?keyword=nutella'