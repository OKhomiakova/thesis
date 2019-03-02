<?php

$host = "localhost";
$user = "root";
$password = "";
$db  = "dbHospital";

$link = mysqli_connect($host, $user, "");

if (mysqli_connect_errno()) {
    printf("Failed to connect: %s\n", mysqli_connect_error());
    exit();
}

if (mysqli_query($link, "CREATE DATABASE " . $db) === TRUE) {
    printf("<p>Database " . $db . " has been created successfully.</p>");
}
else {
    printf("<p>Error occured: %s </p>", mysqli_error($link));
}

if (mysqli_query($link, "ALTER DATABASE dbHospital CHARACTER SET utf8 COLLATE utf8_general_ci;") === TRUE) {
    printf("<p>Database collations set to utf8_general_ci.</p>");
}
else {
    printf("<p>Error occured: %s </p>", mysqli_error($link));
}

mysqli_query($link, "SET NAMES utf8");

mysqli_close($link);

$link = mysqli_connect($host, $user, "", $db);

if (mysqli_connect_errno()) {
    printf("Connection failed: %s\n", mysqli_connect_error());
    exit();
}
else {
    echo "<p>Connection completed!</p>";
}

$createTblPatient = "CREATE TABLE tblPatient (
    intPatientId integer not null primary key,
    datInput date NOT NULL,
    intDiseaseHistoryNumber integer NOT NULL,
    txtPatientFullName varchar(100) NOT NULL,
    txtPatientGender varchar(10) NOT NULL,
    txtSGHSGroup varchar(100) NOT NULL, 
    intPatientAge integer(3) NOT NULL, 
    datBirthday date NOT NULL,
    txtMutation varchar(4) NOT NULL,
    txtIBS varchar(4) NOT NULL,
    intOIM integer(10)NOT NULL,
    txtAG varchar(4) NOT NULL,
    txtSmoking varchar(3) NOT NULL,
    txtNutritionSatus varchar(20) NOT NULL,
    txtOperation varchar(10) NOT NULL,
    txtTherapyOK varchar(4) NOT NULL,
    intHeight integer(3) NOT NULL
    )";	

$createTblAnalysis = "CREATE TABLE tblAnalysis (
    intAnalysisId integer not null primary key,
    intPatientId integer not null,
    datAnalysis date,
    decWeight decimal(3),
    decIMT decimal(10),
    decOHS decimal(3),
    decLPNP decimal(3),
    decLPVP decimal(3),
    decTG decimal(3),
    decLPa decimal(4),
    decAST decimal(5),
    decALT decimal(5),
    decBilirubin decimal(3),
    decGlucose decimal(3)
    )";	
    
$createTblTherapy = "CREATE TABLE tblTherapy (
    intTherapyId integer not null primary key,
    intPatientId integer not null,
    datPrescription date,
    txtDrugName varchar(100),
    txtDrugDose varchar(3),
    binTolerance binary
    )";		
    
$createTblDrug = "CREATE TABLE tblDrug (
    intDrugId integer not null primary key,
    txtDrugName varchar(100)
    )";	

/* Создание таблицы не возвращает результирующего набора */
if (mysqli_query($link, $createTblPatient) === TRUE) {
    printf("<p>Table tblPatient has been created successfully.</p>");
}
else {
    printf("<p>Error occured: %s </p>", mysqli_error($link));
}
if (mysqli_query($link, "ALTER TABLE tblPatient CHARACTER SET utf8 COLLATE utf8_general_ci;") === TRUE) {
    printf("<p>Table tblPatient set to utf8_general_ci.</p>");
}
else {
    printf("<p>Error occured: %s </p>", mysqli_error($link));
}


if (mysqli_query($link, $createTblTherapy) === TRUE) {
    printf("<p>Table tblTherapy has been created successfully.</p>");
}
else {
    printf("<p>Error occured: %s </p>", mysqli_error($link));
}
if (mysqli_query($link, "ALTER TABLE tblTherapy CHARACTER SET utf8 COLLATE utf8_general_ci;") === TRUE) {
    printf("<p>Table tblTherapy set to utf8_general_ci.</p>");
}
else {
    printf("<p>Error occured: %s </p>", mysqli_error($link));
}


if (mysqli_query($link, $createTblAnalysis) === TRUE) {
    printf("<p>Table tblAnalysis has been created successfully.</p>");
}
else {
    printf("<p>Error occured: %s </p>", mysqli_error($link));
}
if (mysqli_query($link, "ALTER TABLE tblAnalysis CHARACTER SET utf8 COLLATE utf8_general_ci;") === TRUE) {
    printf("<p>Table tblAnalysis set to utf8_general_ci.</p>");
}
else {
    printf("<p>Error occured: %s </p>", mysqli_error($link));
}


if (mysqli_query($link, $createTblDrug) === TRUE) {
    printf("<p>Table tblDrug has been created successfully.</p>");
}
else {
    printf("<p>Error occured: %s </p>", mysqli_error($link));
}
if (mysqli_query($link, "ALTER TABLE tblDrug CHARACTER SET utf8 COLLATE utf8_general_ci;") === TRUE) {
    printf("<p>Table tblDrug set to utf8_general_ci.</p>");
}
else {
    printf("<p>Error occured: %s </p>", mysqli_error($link));
}

mysqli_close($link);
?>