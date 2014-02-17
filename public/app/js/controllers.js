'use strict';

/* Controllers */
angular.module('myApp.controllers', [])


  .controller('MainCtrl', ['$scope', 'FBUser',function($scope, FBUser) {
      $scope.user = FBUser;
  }])
  
  .controller('MyProfileCtrl', ['$scope', '$http', 'FBUser',
     function($scope,$http, FBUser){
      $scope.user = FBUser;
      var url = 'http://giftguruapi.herokuapp.com/get_user/lily9393@163.com/JSON_CALLBACK';
      function updateQA () {
        var qnurl = 'http://giftguruapi.herokuapp.com/get_questions_without_answer/' +$scope.user_id +'/JSON_CALLBACK';
        $http.jsonp(qnurl).success(function(data) {
            $scope.questions = data.results;
        });
        var ansurl = 'http://giftguruapi.herokuapp.com/get_answers/' + $scope.user_id +'/JSON_CALLBACK';
        $http.jsonp(ansurl).success(function(data) {
            $scope.answers = data.results;
        });
      }
      $http.jsonp(url).success(function(data) {
        $scope.user_id = data.results;
        updateQA();
        $scope.submitAnswer = function(question_id, text) { 
          var url = 'http://giftguruapi.herokuapp.com/set_answer/'+ $scope.user_id +'/'+ question_id +'/' + text +'/JSON_CALLBACK';
          $http.jsonp(url).success(function(data) { updateQA();});
        };
        $scope.deleteAnswer = function(question_id) { 
          var url = 'http://giftguruapi.herokuapp.com/delete_answer/'+ $scope.user_id +'/'+ question_id + '/JSON_CALLBACK';
          $http.jsonp(url).success(function(data) { updateQA();});
        };
      });
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

  .controller('FacebookCtrl', ['$scope', 'FBUser',function($scope, FBUser) {
      $scope.user = FBUser;
  }]);
