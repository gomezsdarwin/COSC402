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
			header("Location: customer_index.php");
		} else {
			echo "You are logged in! Welcome ";
			echo $_SESSION['user_name'];
		}
		?>
		</h2>
		<h2>Please select from the following options!</h2>
		<div class="options">
			<ul>
            	<li><a href="employee_contact.php" title="view stock"> Customer Contact </a></li>
            	<li><a href="employee_donate.php" title="donate"> Update Donation </a></li>
        	</ul>
		</div>
	</div>
	</section>

</body>
</html>