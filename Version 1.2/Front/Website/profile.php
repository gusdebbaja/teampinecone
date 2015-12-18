<?php

session_start();
require('twitteroauth/twitteroauth.php');
require('config.php');

if(empty($_SESSION['access_token']) || empty($_SESSION['access_token'][
  'oauth_token']) || empty($_SESSION['access_token']['oauth_token_secret'])) {
    header('Location: ./clearsessions.php');
  }

  $access_token = $_SESSION['access_token'];

  $connection = new TwitterOauth(CONSUMER_KEY, CONSUMER_SECRET, $access_token[
    'oauth_token'], $access_token['oauth_token_secret']);

  $content = $connection->get('account/verify_credentials');


//  echo "<b>Hi</b>" . $content->name . "<br>";
//  echo "<b>Your last tweet:  </b>" . $content->status->text . "<br>";
//  echo "<b>You posted your last tweet on:  </b>" . $content->status->created_at . "<br>";
//  echo "<img src = " . $content->profile_image_url . ">";

//  echo "<a href= 'clearsessions.php'>logout</a>";
