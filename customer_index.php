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
			echo "Welcome ";
			echo $_SESSION['user_name'];
			echo ", you are logged in!";
		}
		?>
		</h2>
		<h2>Please select from the following options</h2>
		<div class="options">
			<ul>
				<li><a href="customer_update.php" title="update"> Update Information </a></li>
            	<li><a href="customer_stock.php" title="view stock"> View Available Stock </a></li>
            	<li><a href="customer_donate.php" title="donate"> Pledge Donation </a></li>
        	</ul>
		</div>
	</div>
	</section>

</body>
</html>