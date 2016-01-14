<html lang="en">
<!-- This is the navigation bar that is displayed on every page once the user is logged in-->

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link href="http://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>   
  <script type="text/javascript" src="http://twitter.github.io/bootstrap/assets/js/bootstrap-transition.js"></script>
  <script type="text/javascript" src="http://twitter.github.io/bootstrap/assets/js/bootstrap-collapse.js"></script>


</head>

<!-- This is the custom styling for the navigation bar-->
<style>

.navbar-default {
    background-color: #337ab7;
}

.navbar-default .navbar-brand {
    color: white;
}

.navbar-default .navbar-brand:hover,
.navbar-default .navbar-brand:focus {
    color: black;
}

.navbar-default .navbar-nav > li > a {
    color: white;
}

.navbar-default .navbar-nav > li > a:hover,
.navbar-default .navbar-nav > li > a:focus {
    color: black;
}

.navbar-right{
  margin-right: 25px;
  background-color: #e74c3c;
}

</style>
<body>

  <nav class="navbar navbar-default navbar-static-top">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand active" href="index2.php">Fantasy#</a>
      </div>

      <div class="collapse navbar-collapse navHeaderCollapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li><a href="index2.php" class="active">Home<span class"sr-only"></span></a></li>
            <li><a href="profilepage.php">My Profile<span class="sr-only">(current)</span></a></li>
     
          <li><a href="history.php">My Hashtags</a></li>
          <li><a href="leaderboard.php">Leaderboard</a></li>
          <li><a href="howto.php">How To</a></li>
          
          </ul>  
          <ul class="nav navbar-nav navbar-right">
          <li><a href="clearsessions.php" data-toggle="tooltip" type="button"> Logout </a></li>
        </ul>
      </div>
    </div>
  </nav>
</body>