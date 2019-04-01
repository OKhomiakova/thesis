<?php

if(!isset($_POST['submit'])) {
	$file = 'report.xlsx';
	if(file_exists($file))
		unlink($file);
	return;
}

require '../../ext/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

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

$id = $_POST['user_id'];

$getPatientName = "SELECT * FROM tblPatient WHERE intPatientId=$id";
$result = mysqli_query($link, $getPatientName);
if(mysqli_num_rows($result) != 1) {
    $message = "<p style='color:red'> Произошла ошибка. Свяжитесь с администратором... </p>";
    exit;               
}
$row = mysqli_fetch_array($result);


$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->mergeCells("A1:B1");
$sheet->mergeCells("C1:D1");
$sheet->setCellValue('A1', 'Паспортная часть');
$sheet->setCellValue('C1', 'Результаты первого исследования');
$sheet->setCellValue('A2', 'Дата заполнения');
$add_date = $row['datInput'];
$sheet->setCellValue('B2', $add_date);
$sheet->setCellValue('A3', 'Номер ИБ');
$HDnum = $row['intDiseaseHistoryNumber'];
$sheet->setCellValue('B3', $HDnum);
$sheet->setCellValue('A4', 'ФИО');
$fio = $row['txtPatientFullName'];
$sheet->setCellValue('B4', $fio);
$sheet->setCellValue('A5', 'Дата рождения');
$bday = $row['datBirthday'];
$sheet->setCellValue('B5', $bday);
$sheet->setCellValue('A6', 'Возраст');
$age = $row['intPatientAge'];
$sheet->setCellValue('B6', $age);
$sheet->setCellValue('A7', 'Пол');
$gender = $row['txtPatientGender'];
$sheet->setCellValue('B7', $gender);
$sheet->setCellValue('A8', 'Группа СГХС');
$sgxs = $row['txtSGHSGroup'];
$sheet->setCellValue('B8', $sgxs);
$sheet->setCellValue('A9', 'ИБС');
$ibs = $row['txtIBS'];
$sheet->setCellValue('B9', $ibs);
$sheet->setCellValue('A10', 'АГ');
$ag = $row['txtAG'];
$sheet->setCellValue('B10', $ag);
$sheet->setCellValue('A11', 'ОИМ в анамнезе');
$oim = $row['intOIM'];
$sheet->setCellValue('B11', $oim);
$sheet->setCellValue('A12', 'Операция в анамнезе');
$operations = $row['intOperation'];
$sheet->setCellValue('B12', $operations);
$sheet->setCellValue('A13', 'Нутритивный статус');
$nutStatus = $row['txtNutritionStatus'];
$sheet->setCellValue('B13', $nutStatus);
$sheet->setCellValue('A14', 'Рост');
$height = $row['intHeight'];
$sheet->setCellValue('B14', $height);
$sheet->setCellValue('A15', 'Мутации');
$mutation = $row['txtMutation'];
$sheet->setCellValue('B15', $mutation);
$sheet->setCellValue('A16', 'Привержен терапии');
$therapOK = $row['txtTherapyOK'];
$sheet->setCellValue('B16', $therapOK);
$sheet->setCellValue('A17', 'Курение');
$smoking = $row['txtSmoking'];
$sheet->setCellValue('B17', $smoking);
$sheet->getColumnDimension('B')->setWidth(30);
$sheet->getColumnDimension('A')->setWidth(30);
$sheet->getColumnDimension('C')->setWidth(15);
$sheet->getColumnDimension('D')->setWidth(15);
$sheet->setCellValue('C1', 'Результаты первого исследования');

$getResultData = "SELECT * FROM tblAnalysis WHERE intPatientId=$id ";
$getResultData .= "ORDER BY datAnalysis ASC LIMIT 1";
$result = mysqli_query($link, $getResultData);
if(mysqli_num_rows($result) != 1) {
    $message = "<p style='color:red'> Произошла ошибка. Свяжитесь с администратором... </p>";
    exit;               
}
$row = mysqli_fetch_array($result);
$sheet->setCellValue('C2', 'Дата исследования');
$date = $row['datAnalysis'];
$sheet->setCellValue('D2', $date);
$sheet->setCellValue('C3', 'Вес');
$weight = $row['decWeight'];
$sheet->setCellValue('D3', $weight);
$sheet->setCellValue('C4', 'ИМТ');
$imt = $row['decIMT'];
$sheet->setCellValue('D4', $imt);
$sheet->setCellValue('C5', 'ОХС');
$ohs = $row['decOHS'];
$sheet->setCellValue('D5', $ohs);
$sheet->setCellValue('C6', 'ЛПНП');
$lpnp = $row['decLPNP'];
$sheet->setCellValue('D6', $lpnp);
$sheet->setCellValue('C7', 'ЛПВП');
$lpvp = $row['decLPVP'];
$sheet->setCellValue('D7', $lpvp);
$sheet->setCellValue('C8', 'ТГ');
$tg = $row['decTG'];
$sheet->setCellValue('D8', $tg);
$sheet->setCellValue('C9', 'ЛП(а)');
$lpa = $row['decLPa'];
$sheet->setCellValue('D9', $lpa);
$sheet->setCellValue('C10', 'АСТ');
$ast = $row['decAST'];
$sheet->setCellValue('D10', $ast);
$sheet->setCellValue('C11', 'АЛТ');
$alt = $row['decALT'];
$sheet->setCellValue('D11', $alt);
$sheet->setCellValue('C12', 'Билирубин');
$bilirubin = $row['decBilirubin'];
$sheet->setCellValue('D12', $bilirubin);
$sheet->setCellValue('C13', 'Глюкоза');
$glucose = $row['decGlucose'];
$sheet->setCellValue('D13', $glucose);

$writer = new Xlsx($spreadsheet);
$writer->save('report.xlsx');
$file = 'report.xlsx';
if(!file_exists($file)){ // file does not exist
    die('file not found');
} else {
    header("Cache-Control: public");
    header("Content-Description: File Transfer");
    header("Content-Disposition: attachment; filename=$file");
    header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
	header("Cache-Control: max-age=0");

    readfile($file);
    exit;
}
?>