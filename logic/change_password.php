<?php
	session_start();
	if(!isset($_SESSION['user_login']) || !isset($_SESSION['is_admin'])) {
		header("location: ../login_page.php");
	}
	else {
		if($_SESSION['is_admin'] == "yes") {
			header("location:../pages/admin/admin_index.php");
		}
		else {
			header("location:../pages/user/user_index.php");			
		}
	}
?>