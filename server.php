<?php
session_start();

// initializing variables
$username = "root";
$email    = "";
$errors = array();

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'test');

  if (isset($_POST['login_user'])) {
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (count($errors) == 0) {
    	//$password1 = md5($password);
    //  echo "password1 is "+$password1;
    //  echo "password  is "+$password
    	$query = "SELECT * FROM users_data WHERE email='$email' AND password='$password'";
    	$results = mysqli_query($db, $query);
    	if (mysqli_num_rows($results) == 1) {
    	  $_SESSION['email'] = $email;
    	  $_SESSION['success'] = "You are now logged in";
    	  header('location: fuelQuote.html');
    	}else {
    		array_push($errors, "Invalid username or password");
    	}
    }

  }

  ?>
