<?php
    session_start();
    if(!isset($_SESSION['user_login']) || !isset($_SESSION['is_admin'])) {
        header("location:../login_page.php");
    }
	if(isset($_POST["submit"])) {
		if(!isset($_SESSION['user_login']) || !isset($_SESSION['is_admin'])) {
			header("location: ../login_page.php");
		}
		$login = $_SESSION['user_login'];
		$host = "localhost";
		$user = "root";
		$password = "";
		$db  = "dbHospital";
		 
		$link = mysqli_connect($host, $user, $password, $db);
		mysqli_query($link, "set names cp1251");
		mysqli_set_charset($link, "utf8");

		$sql = "SELECT * FROM tblUser WHERE txtUserLogin='$login'";
		$result = mysqli_query($link, $sql);
		$row = mysqli_fetch_array($result);
		if($row['txtUserPassword'] != $_POST['oldPassword']) {
			$error = "Старый пароль введен неверно";
			return;
		}
		if($_POST['newPassword1'] != $_POST['newPassword2']) {
			$error = "Пароли не совпадают";
			return;
		}

		$newpass = $_POST['newPassword1'];
		$sql = "UPDATE `tblUser` SET `txtUserPassword` = '$newpass' WHERE `tblUser`.`txtUserLogin` = '$login'";
		$result = mysqli_query($link, $sql);
		if($result == FALSE) {
			$error = "Внутрення ошибка системы. Свяжитесь с администратором";
			return;
		}

		if($_SESSION['is_admin'] == "yes") {
			header("location:../pages/admin/admin_index.php");
		}
		else {
			header("location:../pages/user/user_index.php");			
		}
	}
?>