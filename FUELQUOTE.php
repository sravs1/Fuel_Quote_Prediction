<?php include('QUOTESERVER.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Fuel Quote Display</title>
	<link rel="stylesheet" href="quoteStyle.css">
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
	<div class="container1">
		<h1 class="label">Fuel Quote</h1>
		<form class="quote_form"  method="post" name="form">
			<?php include('errors.php'); ?>
			<div class="font">Gallons Requested</div>
			<input autocomplete="off" type="number" name="gallons" value="<?php if (isset($_POST['price_user'])) echo ($gallons); ?>">>
			<?php  if (count($gallons_error) > 0) : ?>
			  <div class="error">
			  	<?php foreach ($gallons_error as $error) : ?>
			  	  <p><font color="orange"><?php echo $error ?></font></p>
			  	<?php endforeach ?>
			  </div>
			<?php  endif ?>
      <div class="font">Delivery Address</div>
			<input autocomplete="off" type="text" name="deliveryAddress" readonly
			value="<?php echo($finAddress);?>">
			<div class="font">Delivery Date</div>
			<input autocomplete="off" type="date" name="deliveryDate"
			value="<?php if (isset($_POST['price_user'])) echo ($deliveryDate); ?>">>
			<?php  if (count($date_error) > 0) : ?>
				<div class="error">
					<?php foreach ($date_error as $error) : ?>
						<p><font color="orange"><?php echo $error ?></font></p>
					<?php endforeach ?>
				</div>
			<?php  endif ?>
  	<button type="submit" id="price_user" name="price_user" onclick="return validated()">Get Price</button>
			<div class="font">Suggested Price</div>
			<input autocomplete="off" type="number" name="price" readonly placeholder="CurrentPrice+ Marigin"
			value="<?php if (isset($_POST['price_user'])) echo ($suggested_price); ?>">
			<div class="font">Total Amount Due</div>
			<input autocomplete="off" type="number" name="amount" readonly
			value="<?php if (isset($_POST['price_user'])) echo ($total_price); ?>">>
			<div id="amount_error">Please Click on GetPrice,then only you can submit</div>
			<button type="submit" name="quote_user" onclick="return validated1()">Submit Quote</button>
		</form>
	</div>
	<script src="quote.js"></script>
</body>
</html>
