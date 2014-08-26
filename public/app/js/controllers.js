'use strict';

/* Controllers */
angular.module('myApp.controllers', [])


  // .controller('MainCtrl', ['$scope', 'FBUser',function($scope, FBUser) {
  // combined recCtrl and myProfile Ctrl
  .controller('MainCtrl', ['$scope', '$rootScope', '$routeParams', '$http', 'FacebookService', 'UserService',

    function($scope, $rootScope, $routeParams, $http, Facebook, User){

      // $http.get('../storedresults.json').success(function(data) {
      //   $scope.storedgifts = data;
      // });

      // $http.get('../storedanswer.json').success(function(data) {
      //   $scope.storedanswers = data;
      // });
      
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

      $scope.logout = function () {
        Facebook.logout();
        if ($rootScope.showLoginButton) {
          User.isLogged = false;
          // $location.path('/login');
          window.location.replace("/#/login");
        }
      }


  }])

  .controller('MyProfileCtrl', ['$scope', '$rootScope', '$routeParams', '$http', 'FacebookService', 'UserService',
    function($scope, $rootScope, $routeParams, $http, Facebook, User){
      var url = 'http://giftguruapi.herokuapp.com/get_user/' + $scope.user.id + '/JSON_CALLBACK';
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
        console.log(data, "data");
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

      $scope.logout = function () {
          Facebook.logout();
          if ($rootScope.showLoginButton) {
            User.isLogged = false;
          }
        }
  }])
  
  .controller('RecResultCtrl', ['$scope', '$rootScope', '$routeParams', '$http', 'FacebookService', 'UserService',
    function($scope, $rootScope, $routeParams, $http, Facebook, User){
      // $http.get('../storedresults.json').success(function(data) {
      //   $scope.gifts = data;
      // });
  		var recs_url = 'http://giftguruapi.herokuapp.com/get_recs/'+ $routeParams.fb_id +'/JSON_CALLBACK';
      $http.jsonp(recs_url).success(function(data) {
        console.log(data);
        $scope.gifts = data.results;
      });


    $scope.logout = function () {
      Facebook.logout();
      if ($rootScope.showLoginButton) {
        User.isLogged = false;
      }
    }
  }])
  .controller('FriendsCtrl', ['$scope', '$rootScope', '$routeParams', '$http', 'FacebookService', 'UserService',
    function($scope, $rootScope, $routeParams, $http, Facebook, User){
    
    Facebook.getUserFriends();

    $scope.logout = function () {
      Facebook.logout();
      if ($rootScope.showLoginButton) {
        User.isLogged = false;
      }
    }
  }])


  // https://github.com/Terumi/AngularJS-Facebook-Login/blob/master/js/ctrl.js
  // stella: actually works do not remove
  // facebook service handles login, if it succeeds we also verify the user in the db
  // and save the user credentials in the UserService
  .controller('FcbCtrl', 
    ['$scope', '$rootScope', '$http', '$location', 'FacebookService', 'UserService',

    function($scope, $rootScope, $http, $location, Facebook, User) {
        
        $scope.login = function () {
          Facebook.login();
          if (!$rootScope.showLoginButton) {
            User.isLogged = true;
          }
        };

        $scope.logout = function () {
          Facebook.logout();
          if ($rootScope.showLoginButton) {
            User.isLogged = false;
          }
        }


        $scope.getInfo = function () {
          Facebook.getUserInfo();
        }

        $scope.getFriends = function() {
          console.log($rootScope);
          Facebook.getUserFriends();

        };

    }]);



