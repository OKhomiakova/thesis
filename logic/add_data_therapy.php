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

    if($all = mysqli_query($link, "SELECT * FROM tblTherapy")) {
        $new_id = mysqli_num_rows($all);
    }
    else {
        printf("<p>Error occured: %s </p>", mysqli_error($all));
        exit;
    }

    printf("<p> %s </p>", $new_id);

    echo $_POST;

    $new_intPatientId = $_POST['id'];
    $new_datPrescription = $_POST['dateInput'];
    $new_txtDrugName = $_POST['drug'];
    $new_txtDrugDose = $_POST['dosage'];
    $new_txtTolerance = $_POST['therapyOK'];


    printf("<p> %s </p>", $new_txtPatientFullName);

    $insertIntoTblTherapy = "INSERT into tblTherapy (intTherapyId, intPatientId, datPrescription, txtDrugName, txtDrugDose, txtTolerance) values ($new_id, $new_intPatientId, '$new_datPrescription', 
    '$new_txtDrugName', '$new_txtDrugDose', '$new_txtTolerance')";

    if (mysqli_query($link, $insertIntoTblTherapy) === TRUE) {
        echo "<p> Therapy witd id  #$new_id succesfully added for Patient #$new_intPatientId! </p>";
    }
	else {
        printf("<p>Error occured: %s </p>", mysqli_error($link));
        exit;		
	}
	
	
?>