<?php
	session_start();
	$error = '';
	if(isset($_POST["submit"])) {
		if(empty($_POST['login']) || empty($_POST['password'])) {
			$error = "Неверное имя пользователя или пароль";
		}
		else {
			$login = $_POST['login'];
			$pass = $_POST['password'];

		    $host = "localhost";
		    $user = "root";
		    $password = "";
		    $db  = "dbHospital";
		     
		    $link = mysqli_connect($host, $user, $password, $db);
		    mysqli_query($link, "set names cp1251");
		    mysqli_set_charset($link, "utf8");

		    $sql = "SELECT * FROM tblUser WHERE txtUserLogin='$login' and txtUserPassword='$pass'";
		    echo $sql;
		    $result = mysqli_query($link, $sql);
		    if(mysqli_num_rows($result) != 1) {
				$error = "Неверное имя пользователя или пароль";	    	
		    }
		    else {
		    	$row = mysqli_fetch_array($result);
		    	$_SESSION['user_login'] = $row["txtUserLogin"];
		    	$_SESSION['is_admin'] = $row["txtIsAdmin"];
		    	header("location:index.php");
		    }
		    mysqli_close($link);
		}
	}
?>