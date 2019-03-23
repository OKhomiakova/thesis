<?php
    if(!isset($_POST["submit"])) {
        return;
    }

    $host = "localhost";
    $user = "root";
    $password = "";
    $db  = "dbHospital";
    
    $link = mysqli_connect($host, $user, $password, $db);
    mysqli_query($link, "SET NAMES utf8");
    mysqli_set_charset($link, "utf8");
    
    if (mysqli_connect_errno()) {
        $message = "<p style='color:red'> Произошла ошибка. Свяжитесь с администратором... </p>";
        exit;               
    }

    $login = $_POST['login'];
    $pass = $_POST['password'];
    $name = $_POST['userName'];
    $admin = $_POST['isAdmin'];
    if($all = mysqli_query($link, "SELECT * FROM tblUser")) {
        $id = mysqli_num_rows($all);
    }
    else {
        $message = "<p style='color:red'> Произошла ошибка. Свяжитесь с администратором... </p>";
        exit;               
    }

    $str = "INSERT INTO tblUser values ('$id', '$login', '$name', '$pass', '$admin')";
    if (mysqli_query($link, $str) === TRUE) {
        $message = "<p style='color:green'> Пользователь $name успешно добавлен! </p>";
    }
    else {
        $message = "<p style='color:red'> Произошла ошибка. Свяжитесь с администратором... </p>";
        exit;               
    }
?>