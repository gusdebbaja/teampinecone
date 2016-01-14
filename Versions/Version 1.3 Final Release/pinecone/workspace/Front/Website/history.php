<?php
require_once('sessionhandler.php');
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

    <title>Fantasy# - My Hashtags</title>

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

            $twit_name = $_SESSION["twitter_id"];
            $resultSet = $db->query("SELECT * FROM myhistory WHERE twitter_id= '$twit_name' ORDER BY uses DESC");

            ?>
            <!-- Describing the table for the user -->
                    <div class="container col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 ">
                      <h2>These are your current hashtags, <?php echo $twit_name ?>.</h2>
                      <p>Your previously searched hashtags end up here. The 5 hashtags with the highest number of uses<br> will determine your total score.
                      When you are satisfied with your hashtags and their uses, hit the<br><font size="3" color="red">"Confirm your Hashtags!"</font> button to save them and see how you did on the leaderboard!</p>
                      <table class="table table-hover">
                    
                    <thead>
                        <tr>
                            <th>Hashtag</th>
                            <th>Uses</th>
                        </tr>
                    </thead>
                    <tbody>
            
            <?php
            //Looping through the results and displating them using bootstrap in a table.
            //if no result is found, it echos No results were found!
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
                        <td class="col-md-3"> <?php echo '#',$hashtag ?> </td>
                        <td class="col-md-3"> <?php echo $uses ?> </td>
                    </tr>
                    
                    <?php    
                    } 
                    ?>
                    
                    <?php 
                }
            } else {
                echo "No results were found!";
            }
?>

                    </tbody>
                    </table>
                    <form action='' method='POST'>
                    <input class="btn btn-sm btn-warning" type="submit" value="Confirm your Hahstags!" name="total" />
                    </form>
                    </div>
                    
 <form action='' method='POST'>
    <input class="btn btn-sm btn-warning" type="submit" value="Clear History" name="submit" />
 </form>
 

<?php
if(isset($_POST['submit'])){
// clear hashtags by querying the mysql databse to delete the all of the instanses that the twitter username appears in
 $resultdelete = $db->query("DELETE FROM myhistory WHERE twitter_id = '$twit_name'");
echo "History has been cleared, changes will be visible the next time you visit this page";



}
if(isset($_POST['total'])){
    // inputing the top 5 tags used by the user into the leaderboard table
    $deleteTotal = $db->query("DELETE FROM total WHERE twitter_id = '$twit_name'");
    $getNewTotal = $db->query("SELECT a.twitter_id, SUM(a.uses) FROM(SELECT twitter_id, uses FROM myhistory where twitter_id = '$twit_name' ORDER BY uses DESC  LIMIT 5) as a ORDER by uses DESC");
  while($row = $getNewTotal->fetch_assoc()) {
      $newTotal= $row['SUM(a.uses)'];
    $confirmHashtags = $db->query(" INSERT INTO total (twitter_id, total)
                                    VALUES ('$twit_name','$newTotal')"); 
}
}
?>