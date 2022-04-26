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
		<center><h2>AVAILABLE STOCK</h2><center><br>
		<table>
			<tr>
				<th> User ID </th>
				<th> Fruit   </th>
				<th> Vegetables</th>
				<th> Canned Beans </th>
				<th> Canned Soup </th>
				<th> Canned Chicken </th>
				<th> Canned Fish </th>
			</tr>
			<?php
			include_once("db_connect.php");
			$sql = "SELECT * from food";
			$result = $conn-> query($sql);
				
			if($result-> num_rows > 0){
				while($row = $result-> fetch_assoc()) {
					$sumfruit += $row["fruit"];
					$sumvegetable += $row["vegetables"];
					$sumbeans += $row["cannedbeans"];
					$sumsoup += $row["cannedsoup"];
					$sumchicken += $row["cannedchicken"];
					$sumfish += $row["cannedfish"];

					echo "<tr><td>". $row["id"] ."</td><td>". $row["fruit"] ."</td><td>". $row["vegetables"] ."</td><td>". $row["cannedbeans"] ."</td><td>". $row["cannedsoup"] ."</td><td>". $row["cannedchicken"] ."</td><td>". 
					$row["cannedfish"] ."</td><td>";
				}
				echo "<tr><td>". "Available:" ."</td><td>". $sumfruit ."</td><td>". $sumvegetable ."</td><td>". $sumbeans ."</td><td>". $sumsoup ."</td><td>". $sumchicken ."</td><td>". $sumfish ."</td><td>";
				echo "</table>";
			} else {
				echo "0 results";
			}
			?>
			</table>	
	</section>
</body>