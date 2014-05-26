'use strict';

/* Services */

// Demonstrate how to register services
// In this case it is a simple value service.
// angular.module('myApp.services', [])

angular.module('myApp.services', [])

.service('srvAuth', function ($rootScope) {
        this.watchLoginChange = function() {
			var _self = this;
			console.log("inwatchLoginchange");
			FB.Event.subscribe('auth.authResponseChange', function(response) {

				if (response.status === 'connected') {
					
					/* 
					 The user is already logged, 
					 is possible retrieve his personal info
					*/
					_self.getUserInfo();

					/*
					 This is also the point where you should create a 
					 session for the current user.
					 For this purpose you can use the data inside the 
					 response.authResponse object.
					*/
				} 
				else {
					/*
					 The user is not logged to the app, or into Facebook:
		 			 destroy the session on the server.
					*/
					FB.login(function(response) {
			           // handle the response
			           _self.getUserInfo();
			         }, {scope: 'user_likes, friends_likes, user_friends'});
					 
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
				console.log($rootScope, "in user info");
				$rootScope.$apply(function() { 
					$rootScope.user = _self.user = response; 
				});
			});
		};

		this.getUserFriends = function() {
			console.log("user friends");
			var _self = this;
			FB.api("me/friends",{
			    fields:'id',
			    // limit:10
			  },function(response){
			      // if (response && !response.error) {
			        /* handle the result */
			        console.log($rootScope.user);
			        console.log(response, "friends");
			      // }
			    }

			);

		}
		this.logout =  function() {
			var _self = this;
			FB.logout(function(response) {
				$rootScope.$apply(function() { 
					$rootScope.user = _self.user = {}; 
				});	
			});
		}

});

