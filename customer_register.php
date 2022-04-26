<?php 
ob_start();
include_once("db_connect.php");
session_start();
if(isset($_SESSION['user_id'])) {
	header("Location: customer_register.php");
}
$error = false;
if (isset($_POST['signup'])) {
	$name = mysqli_real_escape_string($conn, $_POST['user']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	$cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);
	$acctype = mysqli_real_escape_string($conn, 1);
	
	if(strlen($password) < 6) {
		$error = true;
		$password_error = "Password must be minimum of 6 characters";
	}
	if($password != $cpassword) {
		$error = true;
		$cpassword_error = "Password and Confirm Password don't match";
	}
    
	if (!$error) {
		if(mysqli_query($conn, "INSERT INTO users(user, email, pass, acctype) VALUES ('" . $name . "', '" . $email . "', '" . md5($password) . "','" . $acctype . "')")) {
			echo "Successfully Registered!";
		} else {
			echo "Error in registering...Please try again later!";
		}
	}
}
?>

<html>
<head>
  <title>Account Registration</title>
  <link rel="stylesheet" type="text/css" href="style.css?v=3">
</head>
<body>
<section class="header">
		<nav>
			<a href="https://www.bowiestate.edu"><img src="images/logo.png"></a>
			<div class="links">
				<ul>
					<li><a href="customer_login.phph" title="Home"> Home </a></li>
                	<li><a href="employee_login.php" title="Employee"> Employee</a></li>
                	<li><a href="admin_login.php" title="Admin"> Admin</a></li>
            	</ul>
			</div>
		</nav>

	<h1>BSU Pantry Registration</h1>
	<h2>Please enter the requested information below!</h2>

	<div class = "input">
		<br><br>
		<form method="post" action="customer_register.php">
    		<div class="input-group">
  	  			<label>Name:</label>
  	  			<input type="text" name="user">
  			</div>
  			<div class="input-group">
  	  			<label>Email:</label>
  	  			<input type="text" name="email">
  			</div>
  			<div class="input-group">
  	  			<label>Password:</label>
  	  			<input type="password" name="password">
  			</div>
  			<div class="input-group">
  	  			<label>Confirm password:</label>
  	  			<input type="password" name="cpassword">
  			</div>
  			<div class="input-group">
  	  			<button type="submit" class="btn" name="signup">register</button>
  			</div>
  			<p>
  				<br>already registered? <a href="customer_login.php">Sign In</a>
  			</p>
  		</form>
		  	<center><span style = "color: red"><?php if (isset($password_error)) echo $password_error; ?></span>
			<span style = "color: red"><?php if (isset($cpassword_error)) echo $cpassword_error; ?></span></center>
	</div>
</section>
</body>
</html>