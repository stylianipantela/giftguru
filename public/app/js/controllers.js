'use strict';

/* Controllers */
angular.module('myApp.controllers', []).

  controller('MyProfileCtrl', ['$scope', '$http', 
     function($scope,$http){
      // $scope.user_id = 11;
      var url = 'http://giftguruapi.herokuapp.com/get_user/st.pantela@hotmail.com/JSON_CALLBACK'
      $http.jsonp(url).success(function(data) {
          //$scope.$apply(function(scope) {
            $scope.user_id = data.results;
            console.log("inside"+$scope.user_id);
          //}) 
      });
      console.log("outside"+$scope.user_id);
      
      var qnurl = 'http://giftguruapi.herokuapp.com/get_questions_without_answer/' +$scope.user_id +'/JSON_CALLBACK'
      $http.jsonp(qnurl).success(function(data) {
          $scope.questions = data.results;
      });

      var ansurl = 'http://giftguruapi.herokuapp.com/get_answers/' + $scope.user_id +'/JSON_CALLBACK'
      $http.jsonp(ansurl).success(function(data) {
          $scope.answers = data.results;
      });

      var id = -9;
      $scope.testf = function(text) { 
          id = id + 10;
          window.setAnswer_callback = function(data) {
            //$scope.setAnswerStatus = data.results;
          }
          $http.jsonp('http://giftguruapi.herokuapp.com/set_answer/411/'+$scope.user_id +'/' + text +'/setAnswer_callback');
      };


  }])
  
  .controller('RecResultCtrl', ['$scope', '$routeParams', '$http', 
  	function($scope, $routeParams, $http){
      $scope.user_id = $routeParams.user_id;
      window.jsonp_callback = function(data) {
        $scope.gifts = data.results;
      }
      // TODO hardcode user_id
  		$http.jsonp('http://giftguruapi.herokuapp.com/get_recs/'+ $scope.user_id +'/jsonp_callback');
  // TODO: check empty json
  }])
  .controller('FacebookCtrl', function ($scope) {
    
  });
