<?php
session_start();
$results =array();
$fullname_error=array();
$address1_error=array();
$address2_error=array();
$city_error=array();
$state_error=array();
$zipcode_error=array();

// initializing variables
$username = "root";
$email    = "";
$errors = array();

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'test');
// REGISTER USER
if(isset($_POST['profile_user'])){
  // receive all input values from the form
    array_push($results, "entered here");

  $fullname = mysqli_real_escape_string($db, $_POST['fullname']);
  if(strlen($fullname)>5|| $fullname==''){
      array_push($fullname_error,"Name length should be less than 50");
  }
  $address1 = mysqli_real_escape_string($db, $_POST['address1']);
  if(strlen($address1)>10 || $address1==''){
      array_push($address1_error,"Name length should be less than 100");
  }
  $address2 = mysqli_real_escape_string($db, $_POST['address2']);
  if(strlen($address2)>10){
      array_push($address2_error,"Length should be less than 100");
  }
  $city = mysqli_real_escape_string($db, $_POST['city']);
  if(strlen($city)>1 || $city==''){
      array_push($city_error,'Length should be less than 100');
  }
  $state = mysqli_real_escape_string($db, $_POST['state1']);
  if($state==null){
      array_push($state_error,'Length should be 2');
  }
  array_push($state_error,"state is");
  array_push($state_error,$state);
  $zipcode = mysqli_real_escape_string($db, $_POST['zipcode']);
  if(strlen($zipcode)>1 || $zipcode=='' || strlen($zipcode<6)){
      array_push($zipcode_error,"Length should be between 6 and 10");
  } 
//$sql = "INSERT INTO  clientprofile(FULLNAME,ADDRESS1,ADDRESS2,CITY,STATE,ZIPCODE) VALUES('new324','sravs1232','245','host','TX','2354')";
$sql = "INSERT INTO clientprofile (FULLNAME,ADDRESS1,ADDRESS2,CITY,STATE,ZIPCODE) VALUES('$fullname', '$address1','$address2','$city','$state','$zipcode')";
if ($db->query($sql) === TRUE) {
    echo "inserteed	 CLIENTPROFILE created successfully";
} else {
    echo "Error creating table: " . $db->error;
}

$db->close();
  	$_SESSION['message'] = "You have successfully created the profile";

 }
