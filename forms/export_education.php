

<?php
header("Content-Type: text/csv");
header("Content-Disposition: attachment; filename=education_leads.csv");

$conn = new mysqli("localhost", "root", "", "canapprove_qa");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$output = fopen("php://output", "w");

// Add CSV column headers
fputcsv($output, ["Name", "Phone", "Email", "Age", "Study In", "Education Qualification", "Nationality", "Nearest Branch", "City", "Page URL"]);

// Fetch data from the education_form table
$result = $conn->query("SELECT name, phone, email, age, study_in, education_qualification, nationality, nearest_branch, city, page_url FROM education_form");

while ($row = $result->fetch_assoc()) {
    fputcsv($output, $row);
}

fclose($output);
$conn->close();
?>
