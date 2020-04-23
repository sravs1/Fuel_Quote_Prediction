<?php
session_start();

// initializing variables
$username = "root";
$email    = "";
$errors = array();

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'test');
$gallons1="";
$delivery_address1="";
$delivery_date1="";
$suggested_price1="";
$total_amount1="";
$email1="";

$sql="SELECT gallons,delivery_address,delivery_date,suggested_price,total_amount,email
      from quote_details where email=$_SESSION['email'];
$result=$db->query($sql);
if($result->num_rows>0)
  while($row=$result->fetch_assoc()){
  $gallons1=$row["ADDRESS1"];
  $delivery_address1=$row["ADDRESS2"];
  $delivery_date1=$row["STATE"];
  $suggested_price1=$row["STATE"];
  $total_amount=$row["STATE"];
  $email1=$row["STATE"];
}
