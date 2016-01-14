<!DOCTYPE html>
<html lang="en">

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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
       <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
       <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
   <![endif]-->
   
   
   <link rel='shortcut icon' href='favicon.ico' type='image/x-icon'/ >

</head>

<body>
 
     <header id="top" class="header">
        <div class="text-vertical-center">
            <h1>Fantasy#</h1>
            <h3>Let's count some hashtags &amp; Have fun!</h3>
            <br>
<!--                    <div class="input-group stylish-input-group col-sm-6 col-sm-offset-3">
                    <input action="saveinput.php" type="text" class="form-control"  placeholder="Let's Count a Hashtag" >
                    <span class="input-group-addon">
                        <button type="submit">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>
                    </span>
                </div>
           
-->
 <center>
     <h2>Search</h2>
     <form action= './search.php' method='get'>
         <input type="text" name="hashtag" pattern="[a-zA-Z0-9#|]{1,35}" title="Letters and numbers only. No spaces or characters allowed" size='50'value="Enter a twitter Hashtag" onBlur="if(this.value=='')this.value='Enter a twitter Hashtag'" onFocus="if
           (this.value=='Enter a twitter Hashtag')this.value='' "> 

         <input type="submit" value="Search"/>
     </form>
     
     
                 <!--Twitter Authentication -->
            <div class="twitterbutton">
            <a href="redirect.php">
              <img src="./img/sign-in-with-twitter-button.png" alt="Mountain View" style="width:100;height:100;">
            </a>
            </div>
        </div>
    </header>
 </center>
    
    
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

</body>

</html>
