<?php
session_start();

// initializing variables
$username = "root";
$email    = "";
$errors = array();
$min=1;
$max=500;

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'test');

// REGISTER USER
if (isset($_POST['quote_user'])) {
  // receive all input values from the form

  $gallons = mysqli_real_escape_string($db, $_POST['gallons']);
  $deliveryDate = mysqli_real_escape_string($db, $_POST['deliveryDate']);

if (filter_var($gallons, FILTER_VALIDATE_INT, array("options" => array("min_range"=>$min, "max_range"=>$max))) === false) {
  array_push($errors, "Gallons value must be btw 1 to 500");
}
else {
    $query = "INSERT INTO quote (GALLONS, DATE)
  			  VALUES('$gallons', '$deliveryDate')";
  	mysqli_query($db, $query);
  	$_SESSION['gallons'] =$gallons ;
  	$_SESSION['success'] = "You are now logged in";
    header('location: login1.php');
}
}
