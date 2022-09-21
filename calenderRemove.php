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

$stmt = $conn->prepare("delete from appointment where appointment_id = ?");

$id = $posted_data['id'];
$stmt->bind_param("i", $id);
$stmt->execute();

$conn->close();

?>