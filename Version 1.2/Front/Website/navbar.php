<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link href="http://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

</head>

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
  color: red;
}

</style>
<body>

  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index2.php">Fantasy#</a>
      </div>

      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
        <?php if($content->name == $content->name):  ?>
            <li><a href="profilepage.php">My Profile<span class="sr-only">(current)</span></a></li>

        <?php else : ?>
            <script type='text/javascript'>confirm("You must dsfasdfasdf!");</script>
            
        <?php endif; ?>

     
          <li><a href="history.php">My History</a></li>
          
          <li><a href="howto.php">How To</a></li>
          
          </ul>  
          <ul class="nav navbar-nav navbar-right">
          <li><a href="clearsessions.php" data-toggle="tooltip" type="button" float="right" class="btn btn-sm btn-danger"> Logout </a></li>
        </ul>
      </div>
    </div>
  </nav>
</body>