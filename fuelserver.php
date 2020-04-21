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

if(!isset($_SESSION['email']))$_SESSION['email']=""; //if user is undefined set it to default (blank)
 if($_SESSION["email"]=="")header('Location: login.php'); //if user index is default (blank) redirect to login
$error=false;
$email=null;
$sql="SELECT email from users_data";
$result=$db->query($sql);
if($result->num_rows>0){
  while($row=$result->fetch_assoc())if($_SESSION["email"]==$row["email"])$email=$row["email"];
}
$address1="";
$address2="";
$sql="SELECT ADDRESS1,ADDRESS2,STATE FROM clientprofile where email='$email'";
$result=$db->query($sql);
if($result->num_rows>0)
while($row=$result->fetch_assoc()){
$address1=$row["ADDRESS1"];
$address2=$row["ADDRESS2"];
$state=$row["STATE"];
echo "the address is ";
echo $address1;
echo $address2;
echo $state;
}

echo "the session email is ";
echo $email;
print("The error is ");
$error=false;
echo $error;

// REGISTER USER
if (isset($_POST['quote_user'])) {
  // receive all input values from the form
  $gallons = mysqli_real_escape_string($db, $_POST['gallons']);
  $deliveryDate = mysqli_real_escape_string($db, $_POST['deliveryDate']);
if (filter_var($gallons, FILTER_VALIDATE_INT, array("options" => array("min_range"=>$min, "max_range"=>$max))) === false) {
  array_push($errors, "Gallons value must be btw 1 to 500");
  print("entering in error");
}
else{
      print("entereing in the calc part");
      $sql="SELECT extract(month from delivery_date) as month from quote_details where email='$email'";
      echo $sql;
      $result=$db->query($sql);
      if($result->num_rows>0){
      while($row=$result->fetch_assoc()){
        print("entered here");
              $month=$row["month"];
      }
    }
    else{
      echo "entered in else";
      echo $db->error;
    }

      echo "month is ";
      echo $month;

      $company_profit_factor=0.1;
      $rate_fluctuation="";
      $suggested_price="";
      $total_price="";
      $margin="";
      $current_price=1.50;
      $gallons_requested_factor="";
      if($state=='TX')
          $location_factor=0.02;
      else {
        $location_factor=0.04;
      }
      if($gallons>1000){
        $gallons_requested_factor=0.02;
      }
      else{
        $gallons_requested_factor=0.03;
      }
      if($month>=6 && $month<=8){
        $rate_fluctuation=0.04;
      }
      else{
        $rate_fluctuation=0.03;
      }
      $historyFactor = 0; //initial
      $historyCheck=0;
      $sql="SELECT email FROM quote_details WHERE email='$email'";
      $result=$db->query($sql);
      if($result->num_rows>0){
        $historyCheck=1;
        $historyFactor = 0.01;        //determine if the user has history
             //if history, historyFacotry value
      }

    $margin=$current_price +($location_factor-$rate_fluctuation+$gallons_requested_factor+$company_profit_factor+$rate_fluctuation);
    $suggested_price=$current_price+$margin;
    $total_price=$gallons*$suggested_price;
    echo "the inserting values are ";
    echo "$gallons";
    echo $deliveryDate;
    echo $suggested_price;
    echo $total_price;
    echo $email;

    $sql = "INSERT INTO quote_details (gallons,delivery_address,delivery_date,suggested_price,total_amount,email)
  			  VALUES($gallons, '$address1'.' '.'$address2'.' '.'$state',$deliveryDate,$suggested_price,$total_price,'$email')";
    if ($db->query($sql) === TRUE) {
        echo "inserted the row successfully";
    } else {
        echo "Error updating the  table: " . $db->error;
    }
  	$_SESSION['gallons'] =$gallons ;
  	$_SESSION['success'] = "You are now logged in";

    header('location: FUELQUOTE.php');
  */
}
}
