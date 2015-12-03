<?php

require('profile.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
  
  <title>My Profile</title>
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

</head>

<style>


</style>

<body>

<?php include("navbar.php"); ?>

    <header id="top" class="header">
        <div class="text-vertical-center">

<div class="container">
      <div class="row">
      <div class="col-md-5  toppad  pull-right col-md-offset-3 ">

       <br>
      </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >


          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title" align="center">Twitter Name: <?php echo $content->name; ?></h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 profile-image" align="center" > <img alt="User Pic" src="<?php echo $content->profile_image_url_https; ?>" class="img-rounded img-responsive" width="120px" height="120px"> </div>
                  <br>
                <div class=" col-md-9 col-lg-9 ">
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Description:</td>
                        <td><?php echo $content->description; ?></td>
                      </tr>
                      <tr>
                        <td>Location:</td>
                        <td><?php echo $content->location; ?></td>
                      </tr>
                      <tr>
                        <td>Number of Followers</td>
                        <td><?php echo $content->followers_count; ?></td>
                      </tr>
                         <tr>
                             <tr>
                        <td>Last Tweets</td>
                        <td><?php echo $content->status->text; ?></td>
                      </tr>
                        <tr>
                        <td>Number of Friends</td>
                        <td><?php echo $content->friends_count; ?></td>
                      </tr>
                      <tr>
                        <td>My Twitter Account</td>
                        <td><a href="https://twitter.com/home">Visit My Website!</a></td>
                      </tr>
                      </tr>

                    </tbody>
                  </table>

                </div>
              </div>
            </div>
            
                 <div class="panel-footer" align="center" >
                            <a href="clearsessions.php" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"> Logout </i></a>
                        </span>
                    </div>

          </div>
        </div>
      </div>
    </div>
</div>
</header>