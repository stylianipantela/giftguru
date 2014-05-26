'use strict';

/* Controllers */
angular.module('myApp.controllers', [])


  // .controller('MainCtrl', ['$scope', 'FBUser',function($scope, FBUser) {
  // combined recCtrl and myProfile Ctrl
  .controller('MainCtrl', ['$scope', '$routeParams', '$http',
    function($scope, $routeParams, $http){
      
      $scope.user_id = $routeParams.user_id;
      $scope.name = "Stella"

      $http.get('../storedresults.json').success(function(data) {
        $scope.storedgifts = data;
      });

      $http.get('../storedanswer.json').success(function(data) {
        $scope.storedanswers = data;
      });
      
      function recResult() {
          var recurl = 'http://giftguruapi.herokuapp.com/get_recs/'+ $scope.user_id +'/JSON_CALLBACK';
          $http.jsonp(recurl).success(function(data) {
              $scope.gifts = data.results;
          });
      }
      
      // TODO: check empty json
      
      // get questions and answers
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

      updateQA();
      recResult();
    
      // // show gift results
      // window.jsonp_callback = function(data) {
      //     $scope.gifts = data.results;
      // }

      $scope.submitAnswer = function(question_id, text) { 
        var url = 'http://giftguruapi.herokuapp.com/set_answer/'+ $scope.user_id +'/'+ question_id +'/' + text +'/JSON_CALLBACK';
        $http.jsonp(url).success(function(data) { updateQA();});
      };

      $scope.deleteAnswer = function(question_id) { 
        var url = 'http://giftguruapi.herokuapp.com/delete_answer/'+ $scope.user_id +'/'+ question_id + '/JSON_CALLBACK';
        $http.jsonp(url).success(function(data) { updateQA();});
      };

      // $scope.getFriends = function() {
      //   console.log($rootScope);
      //   Facebook.getUserFriends();
      // };
  }])

  
  // .controller('MyProfileCtrl', ['$scope', '$http', 'FBUser',
  .controller('MyProfileCtrl', ['$scope', '$http',
     function($scope,$http){
     //function($scope,$http, FBUser){
      //$scope.user = FBUser;
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
  // https://github.com/Terumi/AngularJS-Facebook-Login/blob/master/js/ctrl.js

  .controller('FcbCtrl', ['$scope', '$rootScope', '$http', '$location', 'srvAuth', 

    function($scope, $rootScope, $http, $location, Facebook) {
        
        $scope.login = function () {
            Facebook.login();
        };


        $scope.getInfo = function () {
          FB.api('/me', function (response) {
              console.log('Good to see you, ' + response.name + '.');
          });
        }

        $scope.getFriends = function() {
          console.log($rootScope);
          Facebook.getUserFriends();

        };

    }]);