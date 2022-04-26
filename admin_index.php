<?php
include_once("db_connect.php");
session_start();
?>
<html>
<head>
  <title>Account Registration</title>
  <link rel="stylesheet" type= "text/css" href="style.css?v=2">
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
		</div>
	<div class="input">

	</div>
	
	<div class = "input">
		<h2>
		<?php
		if(!isset($_SESSION['user_id'])) {
			echo "You are not logged in!";
		} else {
			echo "Succesfully logged in!"; 
			echo " Welcome ";
			echo $_SESSION['user_name'];
		}
		?>
		</h2>
		<h2>Please select from the following options!</h2>
		<div class="options">
			<ul>
				<li><a href="admin_customer.php" title="viewCustomers"> View Customer </a></li>
            	<li><a href="admin_employee.php" title="viewEmployee"> View Employees </a></li>
            	<li><a href="admin_createemp.php" title="createEmployee"> Create Employee </a></li>
        	</ul>
		</div>
	</div>
	</section>

</body>
</html>