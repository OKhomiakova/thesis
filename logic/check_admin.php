<?php 
	session_start();
	if(!isset($_SESSION['user_login']) || !isset($_SESSION['is_admin'])) {
		header("login_page.php");
	}
	else {
		if($_SESSION['is_admin'] != "yes") {
			header("index.php");
		}
	}
?>