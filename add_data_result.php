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

    if($all = mysqli_query($link, "SELECT * FROM tblAnalysis")) {
        $new_id = mysqli_num_rows($all);
    }
    else {
        printf("<p>Error occured: %s </p>", mysqli_error($all));
        exit;
    }

    printf("<p> %s </p>", $new_id);

    echo $_POST;

    $new_intPatientId = $_POST['PatientId'];
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

    printf("<p> %s </p>", $new_txtPatientFullName);

    $insertIntoTblAnalysis = "INSERT into tblAnalysis (intAnalysisId, intPatientId, datAnalysis, decWeight, decIMT, decOHS, decLPNP, decLPVP, decTG, decLPa, decAST, decALT, decBilirubin, decGlucose) values ($new_id, $new_intPatientId, $new_datAnalysis, $new_decWeight, $new_intIMT, $new_intOHS, $new_intLPNP, $new_intLPVP, $new_intTG, $new_intLPa, $new_intAST, $new_intALT, $new_intBilirubin,$new_intglucose)";

    if (mysqli_query($link, $insertIntoTblAnalysis) === TRUE) {
        echo "<p> Patient witd id  #$new_id succesfully added! </p>";
    }
	else {
        printf("<p>Error occured: %s </p>", mysqli_error($link));
        exit;		
	}
	
	
?>