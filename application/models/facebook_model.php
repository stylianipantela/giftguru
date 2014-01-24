<?php
require("/application/libraries/facebook/facebook.php");

class facebook_model extends CI_Model {
 
    public function __construct()
    {
        parent::__construct();
 
        // Create our Application instance (replace this with your appId and secret).
        $facebook = new Facebook(array(
          'appId'  => '602143143167099',
          'secret' => '6c0f97cb15e3c5c390a0f074cfbbd9ae',
        ));

        // Get User ID
        $user = $facebook->getUser();

        $_SESSION["id"] = $user;

        // redirect("/public/wishlist.php");

        // We may or may not have this data based on whether the user is logged in.
        //
        // If we have a $user id here, it means we know the user is logged into
        // Facebook, but we don't know if the access token is valid. An access
        // token is invalid if the user logged out of Facebook.

        if ($user) {
          try {
            // Proceed knowing you have a logged in user who's authenticated.
            $user_profile = $facebook->api('/me');
          } catch (FacebookApiException $e) {
            error_log($e);
            $user = null;
          }
        }

        // Login or logout url will be needed depending on current user state.
        if ($user) {
          $logoutUrl = $facebook->getLogoutUrl();
        } else {
          $loginUrl = $facebook->getLoginUrl();
        }

        // This call will always work since we are fetching public data.
        $naitik = $facebook->api('/naitik');
    }
}
