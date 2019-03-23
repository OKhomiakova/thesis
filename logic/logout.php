<?php
	session_start();
	$_SESSION = array();
	setcookie("remember_me1", "", 1, "/");
	setcookie("remember_me2", "", 1, "/");
	setcookie('PHPSESSID', null, 1, '/');
	header("location:../pages/login_page.php");
?>