<?php
  require ('frontpage.php');

    if (isset($_POST['submit']) { //to check if the form was submitted
        $username= $_POST['username'];
    }

    //store all user input in a file called data.txt in the current directory
    $filename = "./data.txt" ;
    $newData = $_POST['newData'] . "\n" ;
    file_put_contents($filename, $newData, FILE_APPEND);

    //now fetch all data and display it
    $lines = file($filename) ;

    echo '<ul>' ;

    foreach ($lines as $line) {
        echo "<li>$line</li>" ;
    }

    echo '</ul>' ;

?>
