<?php include('quoteserver.php') ?>
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
						<li><a href="#">Client Profile</a></li>
	          <li><a href="#">Fuel Quote</a></li>
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
			<input autocomplete="off" type="number" name="gallons">
			<div id="gallons_error">Enter gallons requested</div>
      <div class="font">Delivery Address</div>
			<input autocomplete="off" type="text" name="deliveryAddress" readonly>
			<div class="font">Delivery Date</div>
			<input autocomplete="off" type="date" name="deliveryDate">
			<div id="date_error">Pick a date</div>
			<div class="font">Suggested Price</div>
			<input autocomplete="off" type="number" name="price" readonly placeholder="CurrentPrice+ Marigin">
			<div class="font">Total Amount Due</div>
			<input autocomplete="off" type="number" name="amount" readonly>
      <button type="submit" name="quote_user">Submit</button>

		</form>
	</div>
	<script src="quote.js"></script>
</body>
</html>
