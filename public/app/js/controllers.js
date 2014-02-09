'use strict';

/* Controllers */
angular.module('myApp.controllers', []).
  controller('MyProfileCtrl', ['$scope', '$http', 
     function($scope,$http){
      window.jsonp_callback = function(data) {
        $scope.questions = data.results;
      }
      $http.jsonp('http://giftguruapi.herokuapp.com/get_questions/jsonp_callback');
      
      window.userid_callback = function(data) {
        $scope.user_id = data.results;
      }
      $http.jsonp('http://giftguruapi.herokuapp.com/get_user/test9393@hotmail.com/userid_callback');
      
      window.getAnswer_callback = function(data) {
        $scope.answers = data.results;
      }
      $http.jsonp('http://giftguruapi.herokuapp.com/get_answers/{{user_id}}/userid_callback');
      
      $scope.submit = function(answer) {
        window.setAnswer_callback = function(data) {
          $scope.set_answer = data.results;
        }
        $http.jsonp('http://giftguruapi.herokuapp.com/set_answer/{{user_id}}/1/{{answer}}/setAnswer_callback');
      }
  }])
  
  .controller('RecResultCtrl', ['$scope', '$routeParams', '$http', 

  	function($scope, $routeParams, $http){
      window.jsonp_callback = function(data) {
        $scope.gifts = data.results;
      }
      // TODO hardcode user_id
  		$http.jsonp('http://giftguruapi.herokuapp.com/get_recs/11/jsonp_callback');
  // TODO: check empty json
  }])
  .controller('FacebookCtrl', function ($scope) {
    
  });
