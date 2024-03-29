'use strict';

/* Services */

// Demonstrate how to register services
// In this case it is a simple value service.
// angular.module('myApp.services', [])
// Based on: http://blog.brunoscopelliti.com/facebook-authentication-in-your-angularjs-web-app


angular.module('myApp.services', [])

.service('FacebookService', function ($rootScope) {
	// start by showing the login button, assuming user is not logged in
	$rootScope.showLoginButton = true;
    
    this.watchLoginChange = function() {
		var _self = this;
		console.log("inwatchLoginchange");
		FB.Event.subscribe('auth.authResponseChange', function(response) {
			if (response.status === 'connected') {
				
				_self.getUserInfo();
				$rootScope.showLoginButton = false;
			} 
			else {
				/*
				 The user is not logged to the app, or into Facebook:
	 			 destroy the session on the server.
				*/
				$rootScope.showLoginButton = true;				
			}

		});
	};

	this.login = function() {
		FB.login(function(response) {
           // handle the response
        }, {scope: 'user_likes, friends_likes, user_friends'});	
	};

	this.getUserInfo = function() {
		console.log("user_info");
		var _self = this;
		FB.api('/me', function(response) {
			$rootScope.$apply(function() { 
				$rootScope.user = _self.user = response; 
				console.log($rootScope.user);
			});
		});
	};

	this.getUserFriends = function() {
		var _self = this;
		FB.api('me/friends?fields=installed,first_name,last_name,picture,id',
			function(response){
		      if (response && !response.error) {
		        /* handle the result */
		        $rootScope.$apply(function() { 
					$rootScope.friends = response.data.filter(function (index) {
						return !(typeof index.installed === 'undefined');
					}); 
				});	

		      }
		    }
		);
	};

	this.logout =  function() {
		console.log("logging out");
		var _self = this;
		FB.logout(function(response) {
			$rootScope.$apply(function() { 
				$rootScope.user = _self.user = {}; 
			});	
		});
	};

	this.isLogged = false;
})

.service('UserService', [function() {
	var sdo = {
		isLogged: false,
		username: ''
	};
	return sdo;
}])

;

