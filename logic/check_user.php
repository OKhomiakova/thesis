<?php 
	session_start();
	if(!isset($_SESSION['user_login']) || !isset($_SESSION['is_admin'])) {
		header("location:../login_page.php");
	}
	else {
		if($_SESSION['is_admin'] != "no") {
			header("location:../admin/admin_index.php");
		}
	}
?>