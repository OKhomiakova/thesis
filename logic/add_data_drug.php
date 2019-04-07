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
        $message = "<p style='color:red'> Произошла ошибка. </p>";
        return;               
    }

    $drugName = $_POST['drugName'];
    
    if($all = mysqli_query($link, "SELECT * FROM tblDrug")) {
        $id = mysqli_num_rows($all);
    }
    else {
        $message = "<p style='color:red'> Произошла ошибка. </p>";
        return;               
    }

    $str = 'INSERT INTO tblDrug values (' . $id . ', \'' . $drugName . '\')';
    if (mysqli_query($link, $str) === TRUE) {
        $message = "<p style='color:green'> Препарат $drugName успешно добавлен! </p>";
    }
    else {
        $message = "<p style='color:red'> Произошла ошибка. </p>";
        return;               
    }
?>