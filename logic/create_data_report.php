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

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A1', 'olya');

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