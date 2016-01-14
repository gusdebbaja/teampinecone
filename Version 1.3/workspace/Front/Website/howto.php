<?php
//This page displays a simple text that describe how the user uses the website
require_once('sessionhandler.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  
  <title>How To</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
      <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="http://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <!-- Custom CSS -->
    <link href="css/stylish-portfolio.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">



   <link rel='shortcut icon' href='favicon.ico' type='image/x-icon'/ >
    <title>Fantasy# - How To</title>

</head>

<style>

    .well{
        margin-top: 150px;
    }

</style>

<body>

<?php include("navbar.php"); ?>

    <header id="top" class="header">
        <div class="text">

<div class="container">
      <div class="row">
      <div class="col-md-5  toppad  pull-right col-md-offset-3 ">

       <br>
      </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
    
      <div class="well well-lg">
        
        <div class="text-vertical-center"><h2>This is how our website works!</h2></div>
        <hr size="4" noshade>
        <div class="text-vertical-left"><p>
            This website enables you to search for any hashtag and it will return the number of how many times the 
            hashtag was used.<br>
            <p>You can also login using your Twitter account from the home page and access your Twitter profile by going to 'My Profile' in the navigation bar.<br>
            <p>In your profile page, you will find information extracted from your Twitter account, as well as 
            a list of all the hashtags you searched for on this website.<br>
            <p>If you have any questions please email us using the contact information below or tweet us by clicking 
            the Twitter logo below.<br>
            <p><b>Have fun counting hashtags!</b><br>
         </p></div>
        
      </div>

        </div>
      </div>
    </div>
</div>
</header>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1 text-center">
                    <ul class="list-unstyled">
                        <li><i class="fa fa-envelope-o fa-fw"></i>  <a href="mailto:name@example.com">teampinecone@gmail.com</a>
                        </li>
                    </ul>
                    <br>
                    <ul class="list-inline">
                        <li>
                            <a href="https://twitter.com/lemajbed"><i class="fa fa-twitter fa-fw fa-3x"></i></a>
                        </li>
                    </ul>
                    <hr class="small">
                    <p class="text-muted">Copyright &copy; Pinecone 2015</p>
                </div>
            </div>
        </div>
    </footer>
</html>