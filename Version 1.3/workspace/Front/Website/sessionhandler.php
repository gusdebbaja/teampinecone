<?php
require_once('profile.php');
$content = $connection->get('account/verify_credentials');
$_SESSION["twitter_id"] = $content->name;
$_SESSION["description"] = $content->description;
$_SESSION["followers"] = $content->followers_count;
$_SESSION["following"] = $content->friends_count;
$_SESSION["location"] = $content->location;
$_SESSION["last tweet"] = $content->status->text;
$_SESSION["pic"] = $content->profile_image_url_https;
?>