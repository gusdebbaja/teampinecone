<?php
//*This file destroy the session when the user logs out of their Twitter account.
session_start();
session_destroy(); 


header('Location: index.php');

 ?>
