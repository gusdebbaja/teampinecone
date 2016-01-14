<?php
require_once('sessionhandler.php');// requiring the twitter_id so the user can store his search/ requiring the twitter_id so the user can store his search
if ($_SESSION["twitter_id"] == "") {// if the username cannot be retreieved then the twitter request limit has been reached 
    header("Location: 404twitter.php");// redirect the user to the error page
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Fantasy# - Home</title>

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
<?php
include('navbar.php');
?>


    <style>
        
        .btn.btn-sm.btn-danger{
            margin-top: 20px;
        }
        
        .text-vertical-left{
            margin-left: 38px;
        }
        
    </style>
    

    <header id="top" class="header">
        <div class="text-vertical-center">
            <h1>Fantasy#</h1>
            <h2>Let's count some hashtags &amp; Have fun!</h2>
            <br>
            
            
        
                <div class="container">
	<div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <div id="imaginary_container">
                    <h3 class="text-vertical-left" name="username" align="left">Hello <?php echo $_SESSION["twitter_id"]; ?>,</h3>

                    
        <form class="form-inline" action= './search.php' method='get'>
            <input  class="form-control" type="text" name="hashtag" pattern="[a-zA-Z0-9|]{1,35}" title="Letters and numbers only. No spaces or characters allowed" size='50'value="Enter a twitter Hashtag" onBlur="if(this.value=='')this.value='Enter a twitter Hashtag'" onFocus="if
           (this.value=='Enter a twitter Hashtag')this.value='' "> 
            <input  class="btn btn-default" type="submit" value="Search" name="submit"/>
        </form>
        


                    
	</div>
</div>
        </div>
    </header>
    
    
<!--Game Board -->
    
 <?php 
require("savesearch.php");

        
            
                          $twit_name = $_SESSION["twitter_id"];
            $resultSet = $db->query("SELECT DISTINCT hashtag,uses FROM myhistory ORDER BY uses DESC LIMIT 5");

            ?>
            <div align="center" class="container col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 ">
                      <h2>  <b> <font <font color="#337ab7">Top hashtags</font> </b> </h2> 
                      <table  class="table table-hover">
                    <thead>
                        <tr>
        
                 
                            <th>Hashtag</th>
                            
                            <th>Uses</th>
                        </tr>
                    </thead>
                    <tbody>
            
            <?php
    
            if ($resultSet->num_rows != 0) {
                // output data of each row
                while($rows = $resultSet->fetch_assoc()) 
                {
                    
                    $hashtag = $rows['hashtag'];
                   
                    $uses = $rows['uses'];
                    
                ?>
                    <?php 
                    for($i = 0; $i <= num_rows; $i++){ 
                        ?>
                    
                    <tr>
                        <td class="col-md-3"> <?php echo '#',$hashtag ?> </td>
                        <td class="col-md-3"> <?php echo $uses ?> </td>
                    </tr>
                    
                    <?php    
                    } 
                    ?>
                    
                    <?php 
                    
                }
            } else {
                echo "No result were found!";
            }
?>

                    </tbody>
                    </table>
                    </div>
    <!--End Game Board -->
    
    

    
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

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script>

        document.getElementById("demo").onclick = function() {myFunction()}
    function myFunction() {
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
         document.getElementById("demo").innerHTML = xhttp.responseText;
        }
      };
      xhttp.open("GET", "tests/ping.php", true);
      xhttp.send();
    }

    // Closes the sidebar menu
    $("#menu-close").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });

    // Opens the sidebar menu
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });

    // Scrolls to the selected menu item on the page
    $(function() {
        $('a[href*=#]:not([href=#])').click(function() {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') || location.hostname == this.hostname) {

                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html,body').animate({
                        scrollTop: target.offset().top
                    }, 1000);
                    return false;
                }
            }
        });
    });
    </script>

</body>

</html>
