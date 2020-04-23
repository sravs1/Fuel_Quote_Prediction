<?php
   session_start(); //initialize session variables
    $_SESSION["email"]=""; //set user to default (blank)
    header('Location: login.php'); //redirect to login
?>
