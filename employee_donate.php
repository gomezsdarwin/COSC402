<?php
include('db_connect.php');
session_start();
$currentUser = $_SESSION['user_id'];

if (isset($_POST['submit'])) {
    $user = mysqli_real_escape_string($conn, $_POST['user']);
	$fruit = mysqli_real_escape_string($conn, $_POST['fruit']);
	$vegetables = mysqli_real_escape_string($conn, $_POST['vegetables']);
	$cannedBeans = mysqli_real_escape_string($conn, $_POST['cannedbeans']);
	$cannedSoup = mysqli_real_escape_string($conn, $_POST['cannedsoup']);
	$cannedChicken = mysqli_real_escape_string($conn, $_POST['cannedchicken']);
    $cannedFish = mysqli_real_escape_string($conn, $_POST['cannedfish']);

    $query = "INSERT INTO food(id,fruit,vegetables,cannedbeans,cannedsoup,cannedchicken,cannedfish) VALUES ('$user', '$fruit', '$vegetables','$cannedBeans','$cannedSoup','$cannedChicken','$cannedFish')";
    if(mysqli_query($conn, $query)) {
        header("Location: customer_index.php");
    } else {
        echo "Invalid entry please try again!";
    }
}	
?>

<html>
<head>
  <link rel="stylesheet" type="text/css" href="style.css?v=2">
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
	<div class = "input">
        <h2>Please enter the recieved donations!</h2>
		<form method="post" action="employee_donate.php">
            <div class="input-group">
                <label>ID:</label>
                <input type="text" name="user" value="<?php echo $_SESSION['user_id']; ?>">
            </div>   
            <div class="input-group">
                <label>Fruit:</label>
                <input type="number" name="fruit" value=0>
            </div>
            <div class="input-group">
                <label>Vegetables:</label>
                <input type="number" name="vegetables" value=0>
            </div>
            <div class="input-group">
                <label>Canned Beans:</label>
                <input type="number" name="cannedbeans" value=0>
            </div>
            <div class="input-group">
                <label>Canned Soup:</label>
                <input type="number" name="cannedsoup" value=0>
            </div>
            <div class="input-group">
                <label>Canned Chicken:</label>
                <input type="number" name="cannedchicken" value=0>
            </div>
            <div class="input-group">
                <label>Canned Fish:</label>
                <input type="number" name="cannedfish" value=0>
            </div>
            <div class="input-group">
                <button type="submit" class="btn" name="submit">submit</button>
            </div>
  		</form>
	</div>
</section>
</body>
</html>