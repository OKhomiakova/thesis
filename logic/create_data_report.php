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

$sheet->setCellValue('A4', 'ФИО');
$fio = $row['txtPatientFullName'];
$sheet->setCellValue('B4', $fio);

$sheet->getColumnDimension('B')->setWidth(30);
$sheet->setCellValue('C1', 'Результаты первого исследования');



$sheet->getStyle('A:Z')->getAlignment()->setHorizontal('center');


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