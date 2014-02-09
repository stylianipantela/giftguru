'use strict';

/* Controllers */
angular.module('myApp.controllers', []).
  controller('MyProfileCtrl', ['$scope', '$http', 
     function($scope,$http){
      window.userid_callback = function(data) {
        $scope.user_id = data.results;
      }
      $http.jsonp('http://giftguruapi.herokuapp.com/get_user/st.pantela@hotmail.com/userid_callback');
      
      window.jsonp_callback = function(data) {
        $scope.questions = data.results;
      }
      $http.jsonp('http://giftguruapi.herokuapp.com/get_questions_without_answer/' + user_id + '/jsonp_callback');
      
  //     window.getAnswer_callback = function(data) {
  //       $scope.answers = data.results;
  //     }
  //     $http.jsonp('http://giftguruapi.herokuapp.com/get_answers/'+ $scope.user_id + '/userid_callback');
      
  //     $scope.list = [];
  //     $scope.text = '';
  //     $scope.submit = function() {
  //       if (this.text) {
  //         this.list.push(this.text);
  //         this.text = '';
  //         window.setAnswer_callback = function(data) {
  //           $scope.setAnswerStatus = data.results;
  //         }
  //         $http.jsonp('http://giftguruapi.herokuapp.com/set_answers/'+ $scope.user_id + '/1/'+ $this.text +'/setAnswer_callback');
  //       }
  // };
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
