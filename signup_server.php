<?php
session_start();

// initializing variables
$username = "root";
$email    = "";
$errors = array();

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'test');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form

  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    array_push($errors,"Invalid email format");
  }
if(strlen($password)<6){
  array_push($errors,"Password should be atleast 6 characters");
}

  // first check the database to make sure
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users_data WHERE email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  if ($user) { // if user exists
    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password1 = md5($password);//encrypt the password before saving in the database
  	$query = "INSERT INTO users_data (email, password)
  			  VALUES('$email', '$password')";
    $query1 = "INSERT INTO clientprofile(email) VALUES('$email')";
  //  $query2 = "INSERT INTO quote_details(email) VALUES('$email')";
  	mysqli_query($db, $query);
  	$_SESSION['email'] = $email;
  	$_SESSION['success'] = "You are now logged in";
    mysqli_query($db,$query1);
    //mysqli_query($db,$query2);
    header('location: login.php');
  }
}
