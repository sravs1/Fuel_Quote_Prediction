<?php
session_start();

// initializing variables
$username = "root";
$email    = "";
$errors = array();
$db = mysqli_connect('localhost', 'root', '', 'test');
if(!isset($_SESSION['email']))$_SESSION['email']=""; //if user is undefined set it to default (blank)
 if($_SESSION["email"]=="")header('Location: login.php');

$error=false;
$email=null;
$sql="SELECT email from users_data";
$result=$db->query($sql);
if($result->num_rows>0){
  while($row=$result->fetch_assoc())if($_SESSION["email"]==$row["email"])$email=$row["email"];
}


$sql="SELECT * FROM quote_details WHERE email='$email'";
$result=$db->query($sql);
/*
if($db->query($sql)==TRUE){
	echo "correct query";
}
else{
	echo "error is ".$db->error;
}
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <style>
  h2{
    color:white;
    text-align:center
  }
  </style>
	<meta charset="UTF-8">
	<title>Fuel Quote History</title>
	<link rel="stylesheet" href="tablestyle.css">
</head>
<body>
  <header>
      <div class="container">
        <h1 class="logo"></h1>
        <nav>
          <ul>
            <li><a href="profile_test.php">Client Profile</a></li>
            <li><a href="FUELQUOTE.php">Fuel Quote</a></li>
            <li><a href="quotehistory.php">Fuel Quote History</a></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </nav>
      </div>
    </header>
  	<table style= "width:100%"">
      <h2> Fuel Quote History Details</h2>
      <thead>
        <tr>
				<th>Email</th>
        <th>Gallons</th>
        <th>Delivery Address</th>
        <th> Delivery Date</th>
        <th>Suggested Price</th>
        <th>Total Amount</th>
        </tr>
        </thead>
		<?php
				if($result->num_rows>0)
				while($row=$result->fetch_assoc())
				{
			?>
					<tr>
					<td><?php echo $row['email']; ?> </td>
					<td><?php echo $row['gallons']; ?>  </td>
					<td><?php echo $row['delivery_address']; ?> </td>
					<td><?php echo $row['delivery_date']; ?> </td>
					<td><?php echo $row['suggested_price']; ?> </td>
					<td><?php echo $row['total_amount']; ?> </td>
					</tr>

			<?php
					}
			?>
          </table>
</body>
</html>
