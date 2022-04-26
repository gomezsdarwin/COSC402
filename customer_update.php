<?php
include_once("db_connect.php");
session_start();
$currentUser = $_SESSION['user_id'];
if(isset($_POST['process'])){
    $newFName = $_POST['updateuser'];
    $newLName = $_POST['updatelname'];
    $newEmail = $_POST['updateemail'];
    $newPhone = $_POST['updatephone'];
    $newOrg = $_POST['updateorg'];

    if(!empty($newFName) && !empty($newLName) && !empty($newEmail) && !empty($newPhone) && !empty($newOrg)) {
        $sql2 = "UPDATE users SET user = '$newFName', lname = '$newLName', email = '$newEmail', phonenum = '$newPhone', organization = '$newOrg' WHERE id = '$currentUser'";
        $results2 = mysqli_query($conn, $sql2);
        header ('Location: customer_index.php');
    } else {
        echo "Invalid/Missing entry. Please try again!";
    }
}
?>

<html>
<head>
	<title>Update Information</title>
	<style type = "text/css" href="style.css?v=2">
		label {
			font-family: "Verdana", sans-serif;
			width:175px;
			display:inline-block;
			margin:4px;
			color: black;
		}
		h1 {
			color:black;
			font-family: "Verdana", sans-serif;
			text-align:center;
			padding: 70px;
			font-size: 30px;
		}
		h2 {
			font-family: "Verdana", sans-serif;
			font-size: 15px;
		}
		h3 {
			font-family: "Verdana", sans-serif;
			text-align: center;
			color:black;
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
        <form action = "customer_update.php" method = "post">
        <?php
        $currentUser = $_SESSION['user_id'];
        $sql = "SELECT * FROM users WHERE id ='$currentUser'";

        $result = mysqli_query($conn,$sql);
        
        if($result){
            if(mysqli_num_rows($result)>0){
                while($row = mysqli_fetch_array($result)){
                ?>
                <div class="input">
                    <div class = "input-group">
		            <h2>  Please Update Personal Information </h2>
			        <label for="user">First Name:</label>
                    <input type="text" name="updateuser" value="<?php echo $row['user']; ?>"><br/>
                    
                    <label for="lname">Last Name:</label>
                    <input type="text" name="updatelname" value="<?php echo $row['lname']; ?>"><br/>

                    <label for="email">Email:</label>
                    <input type="text" name="updateemail" value="<?php echo $row['email']; ?>"><br/>
                    
                    <label for="phonenum">Phone #:</label>
                    <input type="number" name="updatephone" value="<?php echo $row['phonenum']; ?>"><br/>
                    
                    <label for="organization">Organization:</label>
                    <input type="text" name="updateorg" value="<?php echo $row['organization']; ?>"><br/>

                    <input type = "submit" name="process">			
	                </form>	
                </div>	
                <?php
                }
            }
        }
        ?>
    </header>
</body>
</html>