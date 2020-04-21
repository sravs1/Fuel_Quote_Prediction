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
	          <li><a href="#">Fuel Quote History</a></li>
						<li><a href="#">Logout</a></li>
	        </ul>
	      </nav>
	    </div>
	  </header>
	<div class="container1">
		<h1 class="label">Fuel Quote</h1>
		<form class="quote_form"  method="post" name="form" onsubmit="return validated()">
			<?php include('errors.php'); ?>

			<div class="font">Gallons Requested</div>
			<input autocomplete="off" type="number" name="gallons"
			value="<?php if (isset($_POST['price_user'])) echo ($gallons); ?>">
			<div id="gallons_error">Enter gallons requested</div>

      <div class="font">Delivery Address</div>
			<input autocomplete="off" type="text" name="deliveryAddress" readonly
			value="<?php echo($address1);?>">

			<div class="font">Delivery Date</div>
			<input autocomplete="off" type="date" name="deliveryDate"
			value="<?php if (isset($_POST['price_user'])) echo ($deliveryDate); ?>">>
			<div id="date_error">Pick a date</div>

  	<button type="submit" id="price_user" name="price_user">Get Price</button>

			<div class="font">suggested Price</div>
			<input autocomplete="off" type="number" name="price" readonly placeholder="CurrentPrice+ Marigin"
			value="<?php if (isset($_POST['price_user'])) echo ($suggested_price); ?>">
			<div id="sprice_error">Please Click on GetQuote</div>

			<div class="font">Total Amount Due</div>
			<input autocomplete="off" type="number" name="amount" readonly
			value="<?php if (isset($_POST['price_user'])) echo ($total_price); ?>">>
			<div id="total_error">Please Click on GetQuote</div>

      <button type="submit" name="quote_user" >Submit</button>
		</form>
	</div>
	<script src="quote.js"></script>
</body>
</html>
