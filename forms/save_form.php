<?php
$conn = new mysqli("localhost", "root", "", "canapprove_qa");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$form_type = $_POST['form_type'];
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$age = $_POST['age'];
$nearest_branch = $_POST['nearest_branch'];
$city = $_POST['city'];
$page_url = $_SERVER['HTTP_REFERER'];  // Store the referring page URL

if ($form_type == "immigration") {
    $preferred_country = $_POST['preferred_country'];
    $nationality = $_POST['nationality'];
    $education_qualification = $_POST['education_qualification'];
    $work_experience = $_POST['work_experience'];
    $job_title = $_POST['job_title'];

    $stmt = $conn->prepare("INSERT INTO immigration_form (name, phone, email, age, preferred_country, nationality, education_qualification, work_experience, job_title, nearest_branch, city, page_url) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssssssss", $name, $phone, $email, $age, $preferred_country, $nationality, $education_qualification, $work_experience, $job_title, $nearest_branch, $city, $page_url);
} else {
    $study_in = $_POST['study_in'];
    $education_qualification = $_POST['education_qualification'];
    $nationality = $_POST['nationality'];

    $stmt = $conn->prepare("INSERT INTO education_form (name, phone, email, age, study_in, education_qualification, nationality, nearest_branch, city, page_url) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssssss", $name, $phone, $email, $age, $study_in, $education_qualification, $nationality, $nearest_branch, $city, $page_url);
}

$stmt->execute();
$stmt->close();
$conn->close();

echo "Form submitted successfully!";
?>
