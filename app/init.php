<?php
session_start();

require_once 'vendor/autoload.php';
require_once 'app/classes/DB.php';
require_once 'app/classes/TwitterAuth.php';

\Codebird\Codebird::setConsumerKey('znbm8mosUjtdThyx1jjAhUQK7','VEVRR7hVaY4vBX1yyHavwHvA0moWgxJsBxh4DwHzRMWq4rUgSe');
$client = \Codebird\Codebird::getInstance();
