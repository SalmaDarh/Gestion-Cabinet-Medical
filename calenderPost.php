<?php
$posted_data = json_decode(file_get_contents('php://input'), 1);

$servername = "localhost";
$username = "cabinetmedical_user";
$password = "c@b!n3t321";
$dbname = "cabinetmedical";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$stmt = $conn->prepare("INSERT INTO appointment (patient_id, appointment_title, appointment_date) VALUES (?, ?, ?)");

$patientID = $posted_data['patientID'];
$eventTitle = $posted_data['eventTitle'];
$eventDate = $posted_data['eventDate'];
$stmt->bind_param("iss", $patientID, $eventTitle, $eventDate);
$stmt->execute();

$conn->close();

?>