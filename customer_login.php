<?php 
ob_start();
include_once("db_connect.php");
session_start();
if(isset($_SESSION['user_id'])!="") {
	header("Location: customer_index.php");
}
if (isset($_POST['login'])) {
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	$result = mysqli_query($conn, "SELECT * FROM users WHERE email = '" . $email. "' and pass = '" . md5($password) . "'");
	if ($row = mysqli_fetch_array($result)) {
		$_SESSION['user_id'] = $row['id'];
		$_SESSION['user_name'] = $row['user'];		
		header("Location: customer_index.php");
	} else {
		echo "Invalid login. Please try again!!";
	}
}
?>
<html>
<head>
  <title>Account Registration</title>
  <link rel="stylesheet" type= "text/css" href="style.css?v=3">
</head>
<body>
	<section class="header">
		<nav>
			<a href="https://www.bowiestate.edu"><img src="images/logo.png"></a>
			<div class="links">
				<ul>
                	<li><a href="employee_login.php" title="Employee"> Employee </a></li>
                	<li><a href="admin_login.php" title="Admin"> Admin </a></li>
            	</ul>
			</div>
		</nav>

		<h1> Welcome to the BSU Food Pantry!</h1>
		<h2>  All elderly, volunteers, and folks pledging food donations please log in below to gain access!</h2>
		
		<div class="input">
			<h3><br><br>Please enter your email address and password:<br><br></h3>
			<form method="post" action="customer_login.php">
  			<div class="input-group">
  				<label>Email:</label>
  				<input type="text" name="email" >
  			</div>
  			<div class="input-group">
  				<label>Password:</label>
  				<input type="password" name="password">
  			</div>
  			<div class="input-group">
  				<button type="submit" class="btn" name="login">Login</button>
  			</div>
  			<p>
				  <br>Not yet a member? <a href="customer_register.php">Sign Up</a>
			</p>
  			</form>
		</div>
	</section>
</body>
</html>
