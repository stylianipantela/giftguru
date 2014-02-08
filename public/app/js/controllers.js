'use strict';

/* Controllers */

angular.module('myApp.controllers', []).
  controller('MyCtrl1', [function() {
  }])
  .controller('MyProfileCtrl', [function() {

  }])
  .controller('RecResultCtrl', ['$scope', '$routeParams', '$http', 
  	function($scope, $routeParams, $http){
  		$http.get('data/data.json').success(function(data) {
      	$scope.gifts = data;
      });
  }])
  .controller('MyCtrl2', [function() {
  		
  }]);

  // 'http://giftguruapi.herokuapp.com/products?keyword=nutella'