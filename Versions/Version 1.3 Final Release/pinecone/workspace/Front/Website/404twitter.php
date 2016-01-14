<?php 
// This page is displayed when the user passes the rate limit set by Twitter's API 

require("profile.php")
?>
<!DOCTYPE html>
<html lang="en">
<?php
session_destroy();
?>
<!-- Main website -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Fantasy#</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/stylish-portfolio.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

   <link rel='shortcut icon' href='favicon.ico' type='image/x-icon'/ >
    <title>Fantasy# - 404 Error</title>

</head>
    <header id="top" class="header">
        <div class="text-vertical-center">
            <img src="img/error-img.png"></img>
            <h1>Welcome To My Fantasy#</h1>
            <h3>We are handling too many hashtags at this moment!</h3>
            <body>

            <h3>Please try again later</h3>
            <a href="index.php" type="button" class="btn btn-sm btn-primary">Take Me Home!</a>
    </header>

            
</body>
</html>
<?php
print_r($access_token);

?>
