<?php
$posted_data = $_POST;

//json_decode(file_get_contents('php://input'), 1);

$servername = "localhost";
$username = "cabinetmedical_user";
$password = "c@b!n3t321";
$dbname = "cabinetmedical";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$isNew = $posted_data['isNew'];
if($isNew == "false"){
  $stmt = $conn->prepare("UPDATE compte_rendu  SET compte_rendu_date = ?, compte_rendu_contenu = ? WHERE compte_rendu_id = ?;");

  $compteRenduDate = $posted_data['compteRenduDate'];
  $compteRenduContenu = $posted_data['compteRenduContenu'];
  $compteRenduContenuID = $posted_data['compteRenduContenuID'];
  $stmt->bind_param("ssi", $compteRenduDate, $compteRenduContenu, $compteRenduContenuID);
  $stmt->execute();

  $redirect_url = "modifierComptRendu.php?id=" . $compteRenduContenuID;

}
else{
  $stmt = $conn->prepare("INSERT INTO compte_rendu (patient_id, compte_rendu_date, compte_rendu_contenu) VALUES (?, ?, ?)");

  $patientId = $posted_data['patientId'];
  $compteRenduDate = $posted_data['compteRenduDate'];
  $compteRenduContenu = $posted_data['compteRenduContenu'];
  $stmt->bind_param("iss", $patientId, $compteRenduDate, $compteRenduContenu);
  $stmt->execute();

  $redirect_url = "CompteRendu.php?id=" . $patientId;
}

$conn->close();

?>
<script>
  window.location.href = "<?php echo $redirect_url ?>"
</script>