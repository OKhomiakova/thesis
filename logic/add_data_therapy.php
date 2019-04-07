<?php
    $host = "localhost";
    $user = "root";
    $password = "";
    $db  = "dbHospital";
    
    $link = mysqli_connect($host, $user, $password, $db);
    
    if (mysqli_connect_errno()) {
        $message = "<p style='color:red'> Произошла ошибка. Свяжитесь с администратором... </p>";
        exit();
    }

    mysqli_query($link, "SET NAMES utf8");

    if(!isset($_POST['submit'])) {
        if(!($result = mysqli_query($link, "SELECT * FROM tblDrug"))) {
            $message = "<p style='color:red'> Произошла ошибка. Свяжитесь с администратором... </p>";
            exit;
        }

        $drugs = array();        
        while($row = mysqli_fetch_array($result)){
               array_push($drugs, $row['txtDrugName']);
        }
        return;
    }

    if($all = mysqli_query($link, "SELECT * FROM tblTherapy")) {
        $new_id = mysqli_num_rows($all);
    }
    else {
        $message = "<p style='color:red'> Произошла ошибка. Свяжитесь с администратором... </p>";
        exit;
    }

    $new_intPatientId = $_POST['id'];
    $new_datPrescription = $_POST['dateInput'];
    $new_txtDrugName = $_POST['drug'];
    $new_txtDrugDose = $_POST['dosage'];
    $new_txtTolerance = $_POST['therapyOK'];

    $insertIntoTblTherapy = "INSERT into tblTherapy (intTherapyId, intPatientId, datPrescription, txtDrugName, txtDrugDose, txtTolerance) values ($new_id, $new_intPatientId, '$new_datPrescription', 
    '$new_txtDrugName', '$new_txtDrugDose', '$new_txtTolerance')";

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

    if (mysqli_query($link, $insertIntoTblTherapy) === TRUE) {
        $message = "<p style='color:green'> Терапия для пациента $patname успешно добавлена! </p>";
    }
	else {
        $message = "<p style='color:red'> Произошла ошибка. Свяжитесь с администратором... </p>";
        exit;		
	}	
?>