<?php
	session_start();
	if(isset($_COOKIE["remember_me1"]) && isset($_COOKIE["remember_me2"])) {
		
		$id = $_COOKIE["remember_me1"];
		$hash = $_COOKIE["remember_me2"];
	    $host = "localhost";
	    $user = "root";
	    $password = "";
	    $db  = "dbHospital";
	     
	    $link = mysqli_connect($host, $user, $password, $db);
	    mysqli_query($link, "set names cp1251");
	    mysqli_set_charset($link, "utf8");

		$sql = "SELECT * FROM tblUser WHERE intUserId='$id'";
	    $result = mysqli_query($link, $sql);
	    if(mysqli_num_rows($result) != 1) {
			setcookie("remember_me1", "", 1, "/");
			setcookie("remember_me2", "", 1, "/");
			setcookie('PHPSESSID', null, 1, '/');
	    }
	    else {
	    	$row = mysqli_fetch_array($result);
			$str = $row["txtUserLogin"] . $row["txtUserPassword"];
		    $str = md5($str);
		    if($str == $hash) {
			    $_SESSION['user_login'] = $row["txtUserLogin"];
		    	$_SESSION['is_admin'] = $row["txtIsAdmin"];
		    	$_SESSION['user_name'] = $row["txtUserFullName"];
			    setcookie("remember_me1", $id, strtotime('+30 days'), "/");
			    setcookie("remember_me2", $str, strtotime('+30 days'), "/");
		    	if($_SESSION['is_admin'] == "yes")
		    		header("location:admin/admin_index.php");
		    	else
					header("location:user/user_index.php");
		    }
		    else {
				setcookie("remember_me1", "", 1, "/");
				setcookie("remember_me2", "", 1, "/");
				setcookie('PHPSESSID', null, 1, '/');
		    }
	    }
	}

	if(isset($_POST["submit"])) {
		$error = '';
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
		    $result = mysqli_query($link, $sql);
		    if(mysqli_num_rows($result) != 1) {
				$error = "Неверное имя пользователя или пароль";	    	
		    }
		    else {
		    	$row = mysqli_fetch_array($result);
		    	$_SESSION['user_login'] = $row["txtUserLogin"];
		    	$_SESSION['is_admin'] = $row["txtIsAdmin"];
		    	$_SESSION['user_name'] = $row["txtUserFullName"];
			    $str = $row["txtUserLogin"] . $row["txtUserPassword"];
			    $str = md5($str);
			    setcookie("remember_me1", $row["intUserId"], strtotime('+30 days'), "/");
			    setcookie("remember_me2", $str, strtotime('+30 days'), "/");
		    	if($_SESSION['is_admin'] == "yes")
		    		header("location:admin/admin_index.php");
		    	else
					header("location:user/user_index.php");
		    }
		    mysqli_close($link);
		}
	}
?>