<?php error_reporting (E_ALL ^ E_NOTICE); ?>
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

if(!isset($_SESSION['email'])){
$_SESSION['email']="";
//echo "entering in the new loop";
} //if user is undefined set it to default (blank)
if($_SESSION["email"]=="")header('Location: login.php'); //if user is default (blank) redirect to login page

//echo "the session email is ";
//echo $_SESSION['email'];
$error=false;
// REGISTER USER

  if ($_SERVER['REQUEST_METHOD'] == 'POST' && $error==false){
//if(isset($_POST['profile_user'])){
  // receive all input values from the form
    array_push($results, "entered here");
  $fullname = mysqli_real_escape_string($db, $_POST['fullname']);
  if(strlen($fullname)>50|| $fullname==''){
  //  print("entering in fullname length");
      $error=true;
      array_push($fullname_error,"Provide Name with length less than 50");
  }
  $address1 = mysqli_real_escape_string($db, $_POST['address1']);
  if(strlen($address1)>100 || $address1==''){
    $error=true;
      array_push($address1_error,"Provide Address with length less than 100");
  }
  $address2 = mysqli_real_escape_string($db, $_POST['address2']);
  if(strlen($address2)>100){
    $error=true;
      array_push($address2_error,"Address Length should be less than 100");
  }
  $city = mysqli_real_escape_string($db, $_POST['city']);
  if(strlen($city)>100 || $city==''){
    $error=true;
      array_push($city_error,'Provide city with length less than 100');
  }
  $state = mysqli_real_escape_string($db, $_POST['state']);
  if($state==''){
    $error=true;
      array_push($state_error,'Provide state with Length should be 2');
  }
  //array_push($state_error,"state is");
  //array_push($state_error,$state);
  $zipcode = mysqli_real_escape_string($db, $_POST['zipcode']);
  if(strlen($zipcode)>100 || $zipcode=='' || strlen($zipcode<5)){
    $error=true;
      array_push($zipcode_error,"Provide zipcode Length should be between 6 and 10");
  }


//echo "the error value after all these is ";
//echo $error;

  //  echo "entereing here";
  $email=null;
  $sql="SELECT email FROM users_data";
  $result=$db->query($sql);
  if($result->num_rows>0)
  while($row=$result->fetch_assoc()){
      if($_SESSION["email"]==$row["email"]){
          $email=$row["email"];
      }
  }

if($error==false){
//  echo "the new email is ";
//  echo $email;
       if($db->connect_error){
         echo "connection error";
         die("Connection failed: ".$db->connect_error);
       }
       $sql="UPDATE clientprofile SET FULLNAME='".$_POST["fullname"]."' WHERE email='$email'";
/*
       if ($db->query($sql) === TRUE) {
           echo "updated the row successfully";
       } else {
           echo "Error updating the  table: " . $db->error;
       }
       */
       $sql="UPDATE clientprofile SET ADDRESS1='".$_POST["address1"]."' WHERE email='$email'";
       $db->query($sql);
       $sql="UPDATE clientprofile SET ADDRESS2='".$_POST["address2"]."' WHERE email='$email'";
       $db->query($sql);


       $sql="UPDATE clientprofile SET CITY='$city' WHERE email='$email'";
       $db->query($sql);
       $sql="UPDATE clientprofile SET STATE='$state' WHERE email='$email'";
       $db->query($sql);
       $sql="UPDATE clientprofile SET ZIPCODE='$zipcode' WHERE email='$email'";
       $db->query($sql);
       $db->close();
      header('Location: FUELQUOTE.php'); //if valid input redirect to calculator
}
}






/*
//$sql = "INSERT INTO  clientprofile(FULLNAME,ADDRESS1,ADDRESS2,CITY,STATE,ZIPCODE) VALUES('new324','sravs1232','245','host','TX','2354')";
$sql = "INSERT INTO clientprofile (FULLNAME,ADDRESS1,ADDRESS2,CITY,STATE,ZIPCODE) VALUES('$fullname', '$address1','$address2','$city','$state','$zipcode')";
if ($db->query($sql) === TRUE) {
    echo "inserteed	 CLIENTPROFILE created successfully";
} else {
    echo "Error creating table: " . $db->error;
}

$db->close();
  	$_SESSION['message'] = "You have successfully created the profile";

*/
