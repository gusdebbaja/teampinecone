<?php

session_start();
require_once('twitteroauth/twitteroauth.php');
require_once('config.php');

if(empty($_SESSION['access_token']) || empty($_SESSION['access_token'][
  'oauth_token']) || empty($_SESSION['access_token']['oauth_token_secret'])) {
    header('Location: ./clearsessions.php');
  }

  $access_token = $_SESSION['access_token'];

  $connection = new TwitterOauth(CONSUMER_KEY, CONSUMER_SECRET, $access_token[
    'oauth_token'], $access_token['oauth_token_secret']);


?>
