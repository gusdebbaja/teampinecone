<?php

require('profile.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link href="http://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

</head>

<style>
.container{
  margin: 300px;
}
.input-group{
  max-height: 20px;
}

.stylish-input-group .input-group-addon{
    background: white;

}
.stylish-input-group .form-control{
	border-right:0;
	box-shadow:0 0 0;
	border-color:#ccc;
}

.stylish-input-group button{
    border:0;
    background:transparent;
}
</style>

<body>

<?php include("navbar.php"); ?>

<div class="container">
	<div class="row">
        <div class="col-sm-6 col-sm-offset-3">
          <h1 class="hello" name="username">Hello, <?php echo $content->name; ?>,</h1>
            <div id="imaginary_container">
                <div class="input-group stylish-input-group">
                    <input action="saveinput.php" type="text" class="form-control"  placeholder="Let's Count a Hashtag" >
                    <span class="input-group-addon">
                        <button type="submit">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>
                    </span>
                </div>
            </div>
        </div>
	</div>
</div>

</body>
