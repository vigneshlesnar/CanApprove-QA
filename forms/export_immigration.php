<?php
header("Content-Type: text/csv");
header("Content-Disposition: attachment; filename=immigration_leads.csv");

$conn = new mysqli("localhost", "root", "", "canapprove_qa");
$output = fopen("php://output", "w");

fputcsv($output, ["Name", "Phone", "Email", "Age", "Preferred Country", "Nationality", "Education Qualification"]);
$result = $conn->query("SELECT name, phone, email, age, preferred_country, nationality, education_qualification FROM immigration_form");
while ($row = $result->fetch_assoc()) fputcsv($output, $row);

fclose($output);
?>
