<?php 
ob_start();
include_once("db_connect.php");
session_start();
if(isset($_SESSION['user_id'])!="") {
	header("Location: admin_login.php");
}
if (isset($_POST['login'])) {
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	$acctype = mysqli_real_escape_string($conn, 0);

	$result = mysqli_query($conn, "SELECT * FROM employees WHERE email = '" . $email. "' and pass = '" . $password . "' and acctype = '". $acctype ."'");
	if ($row = mysqli_fetch_array($result)) {
		$_SESSION['user_id'] = $row['id'];
		$_SESSION['user_name'] = $row['user'];
		header("Location: admin_index.php");
	} else {
		echo "Invalid Login!";
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
					<li><a href="customer_login.php" title="Bowie State University"> Home </a></li>
                	<li><a href="employee_login.php" title="Bowie State University"> Employee</a></li>
            	</ul>
			</div>
		</nav>

		<h1> Administrator Login</h1>
		<h2> Employees visit "Employee" all else visit "Home"</h2>
		
		<div class="input">
			<h3>Please enter your email address and password:<br><br></h3>
			<form method="post" action="admin_login.php">
  			<?php include('errors.php'); ?>
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
  			</form>
		</div>
	</section>
</body>
</html>