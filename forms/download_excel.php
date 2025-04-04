<?php
require 'PHPExcel/PHPExcel.php';
$conn = new mysqli("localhost", "root", "", "canapprove_qa");

$objPHPExcel = new PHPExcel();
$objPHPExcel->getProperties()->setTitle("Leads Export");

// Immigration Sheet
$sql = "SELECT * FROM immigration_leads";
$result = $conn->query($sql);
$sheet1 = $objPHPExcel->setActiveSheetIndex(0);
$sheet1->setTitle("Immigration Leads");
$headers = ['ID', 'Name', 'Phone', 'Email', 'Age', 'Preferred Country', 'Nationality', 'Education Qualification', 'Work Experience', 'Job Title', 'Nearest Branch', 'City', 'Created At'];
$sheet1->fromArray($headers, NULL, 'A1');
$row = 2;
while ($data = $result->fetch_assoc()) {
    $sheet1->fromArray(array_values($data), NULL, "A$row");
    $row++;
}

// Education Sheet
$sql = "SELECT * FROM education_leads";
$result = $conn->query($sql);
$objPHPExcel->createSheet();
$sheet2 = $objPHPExcel->setActiveSheetIndex(1);
$sheet2->setTitle("Education Leads");
$headers = ['ID', 'Name', 'Phone', 'Email', 'Age', 'Study In', 'Education Qualification', 'Nationality', 'Nearest Branch', 'City', 'Created At'];
$sheet2->fromArray($headers, NULL, 'A1');
$row = 2;
while ($data = $result->fetch_assoc()) {
    $sheet2->fromArray(array_values($data), NULL, "A$row");
    $row++;
}

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Leads.xlsx"');
PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007')->save('php://output');
$conn->close();
?>
