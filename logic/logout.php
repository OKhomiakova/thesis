<?php
	session_start();
	setcookie("remember_me1", "");
	setcookie("remember_me2", "");
	if(session_destroy()) {
		setcookie('PHPSESSID', null, -1, '/');
		header("location:../pages/login_page.php");
	}
?>