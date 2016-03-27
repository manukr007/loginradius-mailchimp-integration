<?php

include_once __DIR__ . "/php-sdk/src/LoginRadiusSDK/LoginRadius.php";
include_once __DIR__ . "/php-sdk/src/LoginRadiusSDK/LoginRadiusException.php";
include_once __DIR__ . "/php-sdk/src/LoginRadiusSDK/SocialLogin/GetProvidersAPI.php";
include_once __DIR__ . "/php-sdk/src/LoginRadiusSDK/SocialLogin/SocialLoginAPI.php";
include_once __DIR__ . "/php-sdk/src/LoginRadiusSDK/CustomerRegistration/UserAPI.php";
include_once __DIR__ . "/php-sdk/src/LoginRadiusSDK/CustomerRegistration/AccountAPI.php";
include_once __DIR__ . "/php-sdk/src/LoginRadiusSDK/CustomerRegistration/CustomObjectAPI.php";

define('LR_APP_NAME', 'lr-assignment2'); // Replace LOGINRADIUS_SITE_NAME_HERE with your site name that provide in LoginRadius account.
define('LR_API_KEY', '9bedc1c4-c38a-48af-8e2e-33b0bfb51748'); // Replace LOGINRADIUS_API_KEY_HERE with your site API key that provide in LoginRadius account.
define('LR_API_SECRET', '34a5bc40-86b1-4117-a031-d94b4e96f196'); // Replace LOGINRADIUS_API_SECRET_HERE with your site Secret key that provide in LoginRadius account.

use LoginRadiusSDK\LoginRadius;
use LoginRadiusSDK\LoginRadiusException;
use LoginRadiusSDK\SocialLogin\GetProvidersAPI;
use LoginRadiusSDK\SocialLogin\SocialLoginAPI;
use LoginRadiusSDK\CustomerRegistration\UserAPI;
use LoginRadiusSDK\CustomerRegistration\AccountAPI;
use LoginRadiusSDK\CustomerRegistration\CustomObjectAPI;

// Social APIs
$getProviderObject = new GetProvidersAPI(LR_API_KEY, LR_API_SECRET, array('authentication'=>false, 'output_format' => 'json'));

$socialLoginObject = new SocialLoginAPI (LR_API_KEY, LR_API_SECRET, array('authentication'=>false, 'output_format' => 'json'));

// Customer Registration APIs
$userObject = new UserAPI (LR_API_KEY, LR_API_SECRET, array('output_format' => 'json'));

$accountObject = new AccountAPI (LR_API_KEY, LR_API_SECRET, array('output_format' => 'json'));

$customObject = new CustomObjectAPI (LR_API_KEY, LR_API_SECRET, array('output_format' => 'json'));

try{
    $accesstoken = $socialLoginObject->exchangeAccessToken($request_token);//$request_token loginradius token get from social/traditional interface after success authentication.
    $access_token= $accesstoken->access_token;
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}

try{
    $userProfileData = $socialLoginObject->getUserProfiledata($access_token);
}
catch (LoginRadiusException $e){
    $e->getMessage();
    $e->getErrorResponse();
}

?>