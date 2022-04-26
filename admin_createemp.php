<?php 
include_once("db_connect.php");
session_start();

$error = false;
if (isset($_POST['signup'])) {
	$name = mysqli_real_escape_string($conn, $_POST['user']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
    $phonenum = mysqli_real_escape_string($conn, $_POST['phonenum']);
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
		if(mysqli_query($conn, "INSERT INTO employees(user, lname, email, phonenum, pass, acctype) VALUES ('" . $name . "', '" . $lname . "', '" . $email . "', '" . $phonenum . "', '" . md5($password) . "','" . $acctype . "')")) {
            echo "Successfully created!";
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
                    <li><a href="logout.php" title="Bowie State University"> Logout </a></li>
            	</ul>
			</div>
		</nav>

	<h1>BSU Pantry Registration</h1>
	<h2>Please enter the requested information below!</h2>

	<div class = "input">
		<br><br>
		<form method="post" action="admin_createemp.php">
  		<?php include('errors.php'); ?>
    		<div class="input-group">
  	  			<label>First Name:</label>
  	  			<input type="text" name="user">
  			</div>
            <div class="input-group">
  	  			<label> Last Name:</label>
  	  			<input type="text" name="lname">
  			</div>
  			<div class="input-group">
  	  			<label>Email:</label>
  	  			<input type="text" name="email">
  			</div>
            <div class="input-group">
  	  			<label> Phone #:</label>
  	  			<input type="text" name="phonenum">
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
  	  			<button type="submit" class="btn" name="signup"> Create </button>
  			</div>
  		</form>
		  	<center><span style = "color: red"><?php if (isset($password_error)) echo $password_error; ?></span>
			<span style = "color: red"><?php if (isset($cpassword_error)) echo $cpassword_error; ?></span></center>
	</div>
</section>
</body>
</html>