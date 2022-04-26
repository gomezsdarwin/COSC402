<head>
	<title> Pantry Stock </title>
	<style type="text/css">
		table {
			border-collapse: collapse;
			width: 100%:
			color: #588c7e:
			font-family: monospace;
			font-size: 25px;
			text-align: center;
		}
		th {
			background-color: #588c7e;
			color: white;
		}
		tr:nth-child(even) {
			background-color: #f2f2f2;
		}
		tr:nth-child(odd) {
			background-color:gray;
		}
	</style>
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
		<center><h2>CUSTOMER INFO TABLE</h2><center><br>
<table>
	<tr>
		<th> User ID </th>
		<th> First Name   </th>
		<th> Last Name </th>
		<th> Email </th>
		<th> Phone # </th>
	</tr>
	<?php
	include_once("db_connect.php");
	$sql = "SELECT * from users";
	$result = $conn-> query($sql);
		
	if($result-> num_rows > 0){
		while($row = $result-> fetch_assoc()) {
			echo "<tr><td>". $row["id"] ."</td><td>". $row["user"] ."</td><td>". $row["lname"] ."</td><td>". $row["email"] ."</td><td>". $row["phonenum"] ."</td><td>". $row[""] ."</td></tr>";
		}
	} else {
		echo "0 results";
	}
	?>
</table>	
</section>
</body>
</html>