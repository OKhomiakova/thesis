<?php
    if(!isset($_POST["submit"])) {
        return;
    }

    $host = "localhost";
    $user = "root";
    $password = "";
    $db  = "dbHospital";
    
    $link = mysqli_connect($host, $user, $password, $db);
    
    if (mysqli_connect_errno()) {
        $message = "<p style='color:red'> Произошла ошибка. Свяжитесь с администратором... </p>";
        exit;               
    }

    mysqli_query($link, "SET NAMES utf8");

    if($all = mysqli_query($link, "SELECT * FROM tblAnalysis")) {
        $new_id = mysqli_num_rows($all);
    }
    else {
        $message = "<p style='color:red'> Произошла ошибка. Свяжитесь с администратором... </p>";
        exit;               
    }

    $new_intPatientId = $_POST['id'];
    $new_datAnalysis = $_POST['dateInput'];
    $new_decWeight = $_POST['weight']; 
    $new_intIMT = $_POST['IMT'];
    $new_intOHS = $_POST['OHS'];
    $new_intLPNP = $_POST['LPNP'];
    $new_intLPVP = $_POST['LPVP'];
    $new_intTG = $_POST['TG'];
    $new_intLPa = $_POST['LPa'];
    $new_intAST = $_POST['AST'];
    $new_intALT = $_POST['ALT'];
    $new_intBilirubin = $_POST['bilirubin'];
    $new_intglucose = $_POST['glucose'];

    $insertIntoTblAnalysis = "INSERT into tblAnalysis (intAnalysisId, intPatientId, datAnalysis, decWeight, decIMT, decOHS, decLPNP, decLPVP, decTG, decLPa, decAST, decALT, decBilirubin, decGlucose) values ($new_id, $new_intPatientId, '$new_datAnalysis', $new_decWeight, '$new_intIMT', '$new_intOHS', '$new_intLPNP', $new_intLPVP, '$new_intTG', '$new_intLPa', '$new_intAST', '$new_intALT', '$new_intBilirubin', '$new_intglucose')";

    $getPatientName = "SELECT * FROM tblPatient WHERE intPatientId='$new_intPatientId'";
    $result = mysqli_query($link, $getPatientName);
    if(mysqli_num_rows($result) != 1) {
        $message = "<p style='color:red'> Произошла ошибка. Свяжитесь с администратором... </p>";
        exit;               
    }
    else {
        $row = mysqli_fetch_array($result);
        $patname = $row['txtPatientFullName'];
    }


    if (mysqli_query($link, $insertIntoTblAnalysis) === TRUE) {
        $message = "<p style='color:green'> Терапия для пациента $patname успешно добавлена! </p>";
    }
	else {
        $message = "<p style='color:red'> Произошла ошибка. Свяжитесь с администратором... </p>";
        exit;               
	}	
?>