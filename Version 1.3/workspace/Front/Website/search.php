<?php
require_once('sessionhandler.php');
require('savesearch.php');
if ($_SESSION["twitter_id"] == "") {
    header("Location: 404twitter.php");
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

    <title>Fantasy#</title> 
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

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
    include("navbar.php");
    ?>
    
    <header id="top" class="header">
        <div class="text-vertical-center">
            <h1>Fantasy#</h1>
            <h3>Let's count some hashtags &amp; Have fun!</h3>
            <br>

    <!-- search results --> 
     <h2>Search Results</h2>
         <form class="form-inline" herf= 'search.php' method='get'>
         
        <div class="form-group col-sm-6 col-sm-offset-3"> 
            <input class="form-control" type="text" name="hashtag" pattern="[a-zA-Z0-9|]{1,35}" title="Letters and numbers only. No spaces or characters allowed" size='50'value="#<?php echo $_GET['hashtag'] ?> " onBlur="if(this.value=='')this.value='Results for <?php echo $_GET['hashtag'] ?> '" onFocus="if
                    (this.value=='Results for <?php echo $_GET['hashtag'] ?> ')this.value='' "> 
                    
            <input class="btn btn-default" type="submit" value="Search Again!"/>
         </form>
        </div> <br>
        
<?php
set_time_limit(0);

$link = peb_connect('Something@bryndlir-pinecone-2194177', 'abc');
if(!$link) {
    die('Could not connect'. peb_error());
}

$msg = peb_vencode('[~p,~a]', array( 
                                   array($link,$_GET['hashtag'])
                                  ) 
                 );

peb_send_byname('pong',$msg,$link); 

$message = peb_receive($link);
$rs= peb_vdecode( $message) ;


$glans = call_user_func_array('array_merge', $rs);
$uses = $glans[1];
$twitter_id = $_SESSION["twitter_id"];
$theHashtag=$_GET['hashtag'];

//print_r($uses);


$query = "SELECT twitter_id FROM myhistory WHERE (twitter_id = '$twitter_id' AND hashtag = '$theHashtag')";
$doesExist = false;
$result = mysqli_query($db, $query);


if(mysqli_num_rows($result) > 0) {
    $doesExist = true;
} else {
}

if(!$doesExist){
     $sql = "INSERT INTO myhistory (twitter_id, hashtag, uses)
VALUES ('$twitter_id','$theHashtag' ,'$uses')";
if ($db->query($sql)=== TRUE) {

} else {
    echo "Error: " . $sql . "<br>" . $db->error;
}  
} else {
    $sql2 = "UPDATE myhistory SET uses = '$uses' where (hashtag = '$theHashtag' and twitter_id = '$twitter_id')";
    if ($db->query($sql2)=== TRUE) {

} else {
    echo "Error: " . $sql . "<br>" . $db->error;
}
     

}



 

$serverpid = $rs[0][0];

$message = peb_vencode('[~s]', array(
                                    array($_GET['hashtag'])
                                   )
                      );
//peb_send_bypid($serverpid,$message,$link); 
//just demo for how to use peb_send_bypid

peb_close($link);                  



?>
<h2 class="col-sm-6 col-sm-offset-3">  <b>#<?php echo $theHashtag?>   has been used <?php echo $uses?> times! </b> </h2> <br>
    

        
                    <!--Twitter Authentication  removed so far. (can only log in before searching) 
            <div class="twitterbutton col-sm-6 col-sm-offset-3">
            <a href="redirect.php">
              <img src="./img/sign-in-with-twitter-button.png" alt="Mountain View" style="width:100;height:100;">
            </a>
            </div>
        </div>
        -->
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
                        <td> <?php echo '#',$hashtag ?> </td>
                       
                        <td> <?php echo $uses ?> </td>
                    </tr>
                    
                    <?php    
                    } 
                    ?>
                    
                    <?php 
                    //echo "<p>Hashtag: $hashtag <br>Uses: $uses<br /></p>";
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

</body>

</html>
