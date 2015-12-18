<?php
require('profile.php');
if ($content->name == "") {
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

<?php 
require("savesearch.php");

            $twit_name = $content->name;
            $resultSet = $db->query("SELECT * FROM myhistory where twitter_id= '$twit_name'");

            ?>
            
                    <div class="container col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad">
                      <h2>This is your history table, <?php echo $twit_name ?> </h2>
                      <p>You can find all your previous searched hashtags in the table below:</p>            
                      <table class="table table-hover">
                    
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
                    
                    $user_id = $rows['twitter_id'];
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