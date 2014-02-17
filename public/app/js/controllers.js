'use strict';

/* Controllers */
angular.module('myApp.controllers', [])

  .controller('MainCtrl', ['$scope', 'FBUser',function($scope, FBUser) {
      $scope.user = FBUser;
  }])
  
  .controller('MyProfileCtrl', ['$scope', '$http', 'FBUser',
     function($scope,$http, FBUser){
      $scope.user = FBUser;
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

  .controller('FacebookCtrl', function ($scope, facebookService) {
    var fbConfig = {
      method: 'feed',
      name: 'enter a name here...',
      //link: 'a link for your post...',
      //picture: 'an image to include',
      caption: 'a short caption...',
      description: 'a slightly longer description...'
    };

   facebookService.post(fbConfig).then(
      function (success) {
        // the feed post was successful! celebrate!
      },
      function (failure) {
        // womp womp :-(
      });
  });
