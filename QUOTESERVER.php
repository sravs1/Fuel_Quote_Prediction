<?php
session_start();
$gallons_error=array();
$date_error=array();
// initializing variables
$username = "root";
$email    = "";
$errors = array();
$min=1;
$max=999999;

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
$sql="SELECT ADDRESS1,ADDRESS2,STATE,ZIPCODE FROM clientprofile where email='$email'";
$result=$db->query($sql);
if($result->num_rows>0){
while($row=$result->fetch_assoc()){
$address1=$row["ADDRESS1"];
if($address1==''){
  //echo "<script>alert('Seems you are first time user.Please complete client progile registratrion');</script>";
  //window.location.href='profile_test.php';
  echo "<script>
alert('Seems you are first time user.Please complete client progile registratrion');
window.location.href='profile_test.php';
</script>";
}
$address2=$row["ADDRESS2"];
$state=$row["STATE"];
$zip=$row["ZIPCODE"];
//echo "the address is ";
//echo $address1;
//echo $address2;
//echo $state;
}
}
$finAddress=$address1." ".$address2.' '.$state.' '.$zip;
//echo "the finaddress is ".$finAddress;
#echo "the session email is ";
//echo $email;
//print("The error is ");
$error=false;
echo $error;

// REGISTER USER
if (isset($_POST['price_user']) && $error==false) {
  // receive all input values from the form
  $gallons = mysqli_real_escape_string($db, $_POST['gallons']);
  $deliveryDate = mysqli_real_escape_string($db, $_POST['deliveryDate']);
//  echo "delivery date is ".$deliveryDate;
  $month= date('m', strtotime($deliveryDate));
//  echo $month;

  if($gallons<1 || $gallons > 999999 || $gallons==0){
    $error=true;
//if ((filter_var($gallons, FILTER_VALIDATE_INT, array("options" => array("min_range"=>$min, "max_range"=>$max))) === false) || $gallons==0) {
  array_push($gallons_error, "Please request gallons between 1 and 999999");
  //print("entering in error");
}
if ($deliveryDate==''){
  $error=true;
  array_push($date_error,"Please pick a date");
}
if($error==false){
    //  print("entereing in the calc part");
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
    //  print("sql statement is ");
    //  print($sql);
    //  $sql="SELECT gallons FROM quote_details WHERE email='$email'";
      $result=$db->query($sql);
      if($result->num_rows>0){
        while($row=$result->fetch_assoc()){
        //  print("row is");
        //  echo $row["email"];
            if($_SESSION["email"]==$row["email"]){
          //      echo "enetering here";
              $historyCheck=1;
              $historyFactor = 0.01;
            }
        }
        //determine if the user has history
             //if history, historyFacotry value
      }
    //  echo "History check is ";
    //  echo $historyCheck;
    $margin=$current_price*($location_factor-$historyFactor+$gallons_requested_factor+$company_profit_factor+$rate_fluctuation);
    $suggested_price=$current_price+$margin;
    $total_price=$gallons*$suggested_price;


  }
}
  if (isset($_POST['quote_user'])) {
//  $sql = "INSERT INTO quote_details (gallons,delivery_address,delivery_date,suggested_price,total_amount,email)
  //        VALUES('".$_POST['gallons']."', '".$_POST['deliveryAddress']."','".$_POST['deliveryDate']."','".$_POST['price']."','".$_POST['amount']."','".$_SESSION["email"]."')";
  $sql = "INSERT INTO quote_details (gallons,delivery_address,delivery_date,suggested_price,total_amount,email)
       VALUES('".$_POST['gallons']."', '$finAddress','".$_POST['deliveryDate']."','".$_POST['price']."','".$_POST['amount']."','".$_SESSION["email"]."')";
    if ($db->query($sql) === TRUE) {
        echo "inserted the row successfully";
    } else {
        echo "Error updating the  table: " . $db->error;
    }
  	$_SESSION['gallons'] =$gallons ;
  	$_SESSION['success'] = "You are now logged in";

    header('location: quotehistory.php');
}
