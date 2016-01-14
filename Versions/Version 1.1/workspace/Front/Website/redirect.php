<?php

//Twitter Authentication redirect. Establishes new connection with key, secret, and gets request tokens to create twitter authentication connectio
session_start();
require('twitteroauth/twitteroauth.php');
require('config.php');

$connection = new TwitterOauth(CONSUMER_KEY, CONSUMER_SECRET);
$request_token = $connection->getRequestToken(OAUTH_CALLBACK);

$_SESSION['oauth_token'] = $token = $request_token['oauth_token'];
$_SESSION['oauth_token_secret']   = $request_token['oauth_token_secret'];

switch($connection->http_code){
  case 200:
    $url = $connection->getAuthorizeURL($token);
    header('Location: ' . $url);
    break;
  default:
    echo "Oops! Something went wrong! Check in the Twitter Docs for this
    HTTP CODE" . $connection->http_code;
  }
