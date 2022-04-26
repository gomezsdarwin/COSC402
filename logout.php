<?php
ob_start();
session_start();
if(isset($_SESSION['user_id'])) {
	session_destroy();
	unset($_SESSION['user_id']);
	unset($_SESSION['username']);
	header("Location: customer_login.php");
} else {
	header("Location: customer_login.php");
}
?>