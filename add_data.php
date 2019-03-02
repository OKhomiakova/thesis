<?php
    $host = "localhost";
    $user = "root";
    $password = "";
    $db  = "dbHospital";
    
    $link = mysqli_connect($host, $user, $password, $db);
    
    if (mysqli_connect_errno()) {
        printf("Не удалось подключиться: %s\n", mysqli_connect_error());
        exit();
    }

    mysqli_query($link, "SET NAMES utf8");

    printf("<p> HERE </p>");

    if($all = mysqli_query($link, "SELECT * FROM tblPatient")) {
        $new_id = mysqli_num_rows($all);
    }
    else {
        printf("<p>Error occured: %s </p>", mysqli_error($all));
        exit;
    }

    printf("<p> %s </p>", $new_id);

    echo $_POST;

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
    $new_txtNutritionSatus = $_POST['nutStatus'];
    $new_txtOperation = $_POST['operationNum'];
    $new_txtTherapyOK = $_POST['therapyOk'];
    $new_intHeight = $_POST['height'];

    printf("<p> %s </p>", $new_txtPatientFullName);

    $insertIntoTblPatient = "INSERT into tblPatient (intPatientId, datInput, intDiseaseHistoryNumber, txtPatientFullName, txtPatientGender, txtSGHSGroup, intPatientAge, datBirthday, txtMutation, txtIBS, intOIM, txtAG, txtSmoking, txtNutritionSatus, txtOperation, txtTherapyOK,intHeight) values ($new_id, '$new_datInput', $new_intDiseaseHistoryNumber, '$new_txtPatientFullName', '$new_txtPatientGender',
    '$new_txtSGHSGroup', $new_intPatientAge, '$new_datBirthday', '$new_txtMutation', '$new_txtIBS', $new_intOIM, '$new_txtAG','$new_txtSmoking', '$new_txtNutritionSatus','$new_txtOperation', '$new_txtTherapyOK', $new_intHeight)";

    if (mysqli_query($link, $insertIntoTblPatient) === TRUE) {
        echo "<p> Patient witd id  #$new_id succesfully added! </p>";
    }
	else {
        printf("<p>Error occured: %s </p>", mysqli_error($link));
        exit;		
	}
	
	
?>