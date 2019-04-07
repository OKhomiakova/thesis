<?php
    if(isset($_POST['submit'])) {
        $host = "localhost";
        $user = "root";
        $password = "";
        $db  = "dbHospital";
        
        $link = mysqli_connect($host, $user, $password, $db);
        
        if (mysqli_connect_errno()) {
            $message = "<p style=\"color:red;\" >Произошла ошибка... </p>";
            return;
        }
        mysqli_query($link, "SET NAMES utf8");
        if($all = mysqli_query($link, "SELECT * FROM tblPatient")) {
            $new_id = mysqli_num_rows($all);
        }
        else {
            $message = "<p style=\"color:red;\" >Произошла ошибка... </p>";
            return;
        }
        $new_datInput = $_POST['dateInput'];
        $new_intDiseaseHistoryNumber = $_POST['card'];
        $new_txtPatientFullName = $_POST['patientName'];
        $new_txtPatientGender = $_POST['gender'];
        $new_txtSGHSGroup = $_POST['SGHSGroup'];
        $new_intPatientAge = $_POST['age'];
        $new_datBirthday = $_POST['bithDay'];
        $new_txtMutation = $_POST['mutation'];
        $new_txtIBS = $_POST['ibs'];
        $new_intOIM = $_POST['oim'];
        $new_txtAG = $_POST['ag'];
        $new_txtSmoking = $_POST['smoking'];
        $new_txtNutritionStatus = $_POST['nutStatus'];
        $new_intOperation = $_POST['operationNum'];
        $new_txtTherapyOK = $_POST['therapyOk'];
        $new_intHeight = $_POST['height'];

        $insertIntoTblPatient = "INSERT into tblPatient (intPatientId, datInput, intDiseaseHistoryNumber, txtPatientFullName, txtPatientGender, txtSGHSGroup, intPatientAge, datBirthday, txtMutation, txtIBS, intOIM, txtAG, txtSmoking, txtNutritionStatus, intOperation, txtTherapyOK,intHeight) values ($new_id, '$new_datInput', $new_intDiseaseHistoryNumber, '$new_txtPatientFullName', '$new_txtPatientGender',
        '$new_txtSGHSGroup', $new_intPatientAge, '$new_datBirthday', '$new_txtMutation', '$new_txtIBS', $new_intOIM, '$new_txtAG','$new_txtSmoking', '$new_txtNutritionStatus','$new_intOperation', '$new_txtTherapyOK', $new_intHeight)";
        if (mysqli_query($link, $insertIntoTblPatient) === TRUE) {
            $message = "<p style=\"color:green;\" >Новый пациент успешно добавлен! </p>";
        }
    	else {
            $message = "<p style=\"color:red;\" >Произлшда ошибка... </p>";		
    	}
    }	
	
?>