<?php
require_once 'app/init.php';

$auth = new TwitterAuth($client);

$auth->signOut();

header('Location: index.php');
