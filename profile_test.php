<?php include('profile_server.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Validated Login Form</title>
	<link rel="stylesheet" href="test_profilestyle.css">
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
		<h1 class="label">Client Profile Registration</h1>
		<form class="profile_form" method="post" name="form" onsubmit="return validated()">
			<div class="font">Fullname</div>
			<input autocomplete="off" type="text" name="fullname" >
			<?php  if (count($fullname_error) > 0) : ?>
			  <div class="error">
			  	<?php foreach ($fullname_error as $error) : ?>
			  	  <p><font color="orange"><?php echo $error ?></font></p>
			  	<?php endforeach ?>
			  </div>
			<?php  endif ?>
      <div class="font">Address1</div>
			<input autocomplete="off" type="text" name="address1" >
			<?php  if (count($address1_error) > 0) : ?>
				<div class="error">
					<?php foreach ($address1_error as $error) : ?>
						<p><font color="orange" size="1	px"><?php echo $error ?></font></p>
					<?php endforeach ?>
				</div>
			<?php  endif ?>
      <div class="font">Address2</div>
			<input autocomplete="off" type="text" name="address2">
			<?php  if (count($address2_error) > 0) : ?>
				<div class="error">
					<?php foreach ($address2_error as $error) : ?>
						<p><font color="orange"><?php echo $error ?></font></p>
					<?php endforeach ?>
				</div>
			<?php  endif ?>
      <div class="font">City</div>
			<input autocomplete="off" type="text" name="city">
			<?php  if (count($city_error) > 0) : ?>
				<div class="error">
					<?php foreach ($city_error as $error) : ?>
						<p><font color="orange"><?php echo $error ?></font></p>
					<?php endforeach ?>
				</div>
			<?php  endif ?>
      <div class="font">State</div>
			<select name="state1">
        <option value="none" selected disabled hidden >--select an option--</option>
				<option value="AL">Alabama (AL)</option>
				<option value="AK">Alaska (AK)</option>
				<option value="AZ">Arizona (AZ)</option>
				<option value="AR">Arkansas (AR)</option>
				<option value="CA">California (CA)</option>
				<option value="CO">Colorado (CO)</option>
				<option value="CT">Connecticut (CT)</option>
				<option value="DE">Delaware (DE)</option>
				<option value="DC">District Of Columbia (DC)</option>
				<option value="FL">Florida (FL)</option>
				<option value="GA">Georgia (GA)</option>
				<option value="HI">Hawaii (HI)</option>
				<option value="ID">Idaho (ID)</option>
				<option value="IL">Illinois (IL)</option>
				<option value="IN">Indiana (IN)</option>
				<option value="IA">Iowa (IA)</option>
				<option value="KS">Kansas (KS)</option>
				<option value="KY">Kentucky (KY)</option>
				<option value="LA">Louisiana (LA)</option>
				<option value="ME">Maine (ME)</option>
				<option value="MD">Maryland (MD)</option>
				<option value="MA">Massachusetts (MA)</option>
				<option value="MI">Michigan (MI)</option>
				<option value="MN">Minnesota (MN)</option>
				<option value="MS">Mississippi (MS)</option>
				<option value="MO">Missouri (MO)</option>
				<option value="MT">Montana (MT)</option>
				<option value="NE">Nebraska (NE)</option>
				<option value="NV">Nevada (NV)</option>
				<option value="NH">New Hampshire (NH)</option>
				<option value="NJ">New Jersey (NJ)</option>
				<option value="NM">New Mexico (NM)</option>
				<option value="NY">New York (NY)</option>
				<option value="NC">North Carolina (NC)</option>
				<option value="ND">North Dakota (ND)</option>
				<option value="OH">Ohio (OH)</option>
				<option value="OK">Oklahoma (OK)</option>
				<option value="OR">Oregon (OR)</option>
				<option value="PA">Pennsylvania (PA)</option>
				<option value="RI">Rhode Island (RI)</option>
				<option value="SC">South Carolina (SC)</option>
				<option value="SD">South Dakota (SD)</option>
				<option value="TN">Tennessee (TN)</option>
				<option value="TX">Texas (TX)</option>
				<option value="UT">Utah (UT)</option>
				<option value="VT">Vermont</option>
				<option value="VA">Virginia</option>
				<option value="WA">Washington</option>
				<option value="WV">West Virginia</option>
				<option value="WI">Wisconsin</option>
				<option value="WY">Wyoming</option>
</select>
<?php  if (count($state_error) > 0) : ?>
	<div class="error">
		<?php foreach ($state_error as $error) : ?>
			<p><font color="orange"><?php echo $error ?></font></p>
		<?php endforeach ?>
	</div>
<?php  endif ?>
      <div class="font">Zipcode</div>
      <input autocomplete="off" type="text" name="zipcode">
			<?php  if (count($zipcode_error) > 0) : ?>
				<div class="error">
					<?php foreach ($zipcode_error as $error) : ?>
						<p><font color="orange"><?php echo $error ?></font></p>
					<?php endforeach ?>
				</div>
			<?php  endif ?>
      <button type="submit" name="profile_user">Submit</button>
		</form>
	</div>
	<script src="init.js"></script>
</body>
</html>
