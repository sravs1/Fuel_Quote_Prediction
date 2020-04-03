<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Validated Login Form</title>
	<link rel="stylesheet" href="test_style.css">
</head>
<body>
<header>
    <div class="container">
      <h1 class="logo"></h1>
      <nav>
        <ul>
          <li><a href="login.php">Login</a></li>
          <li><a href="signup.php">Sign Up</a></li>
        </ul>
      </nav>
    </div>
  </header>
  	<div class="container1">
  		<h1 class="label">User Login</h1>
  		<form class="login_form" action="login.php" method="post" name="form" onsubmit="return validated()">
				<?php include('errors_login.php'); ?>
  			<div class="font">Username</div>
  			<input autocomplete="off" type="text" name="email">
  			<div id="email_error">Please enter your Email</div>
  			<div class="font font2">Password</div>
  			<input type="password" name="password">
  			<div id="pass_error">Enter your Password</div>
  			<button type="submit" name="login_user">Login</button>
  		</form>
  	</div>
<script src="valid.js"></script>
</body>
</html>
