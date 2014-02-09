'use strict';

/* Controllers */
angular.module('myApp.controllers', []).
  //  controller('MyProfileCtrl', function($scope, $http) {
  //   var url = "http://giftguruapi.herokuapp.com/get_user/st.pantela@hotmail.com/JSON_CALLBACK";

  //   $http.jsonp(url).
  //     success(function(data, status, headers, config) {
  //       $scope.user_id = data.results;
  //       };
  //     }).
  //     error(function(data, status, headers, config) {
  //       console.error('Error fetching feed:', data);
  //     });
  // })

  controller('MyProfileCtrl', ['$scope', '$http', 
     function($scope,$http){
      $scope.user_id = 11;
      window.userid_callback = function(data) {
        $scope.user_id = data.results;
      }
      $http.jsonp('http://giftguruapi.herokuapp.com/get_user/st.pantela@hotmail.com/userid_callback');
      
      window.jsonp_callback = function(data) {
        $scope.questions = data.results;
      }
      $http.jsonp('http://giftguruapi.herokuapp.com/get_questions_without_answer/'+ $scope.user_id +'/jsonp_callback');
      
      window.getAnswer_callback = function(data) {
        $scope.answers = data.results;
      }
      $http.jsonp('http://giftguruapi.herokuapp.com/get_answers/'+ $scope.user_id +'/getAnswer_callback');


      $scope.list = [];
      $scope.text = '';
      $scope.submit = function() {
        if (this.text) {
          window.setAnswer_callback = function(data) {
            $scope.setAnswerStatus = data.results;
          }
          $http.jsonp('http://giftguruapi.herokuapp.com/set_answer/'+ $scope.user_id + '/'+ $this.text +'/setAnswer_callback');
        }
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
