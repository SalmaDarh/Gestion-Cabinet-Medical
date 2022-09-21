<?php
require("fonctions.php");

//$pdo = new PDO("mysql:host=localhost;dbname=cabinetmedical", "root", "");



    if (isset($_POST["submit"])) {
        $cin = $_POST["cin"];
        $confrere = $_POST["confrere"];
        $contenu = $_POST["contenu"] ;
        $dateJ = date("Y-m-d") ;
        include ('database.php');
$pdo = Database::connect();

$identite_patients = $pdo->query("SELECT * FROM patients WHERE (cin like '%$cin%')");
$patients = $identite_patients->fetch();

$nom_prenom = strtoupper($patients['nom'] . "  " . $patients['prenom']);

$date_naiss = $patients['dateNaissance'];

$cin = strtoupper($patients['cin']);

$rdv = $patients['premierRdv'];

require('fpdf.php');

//Création d'un nouveau doc pdf (Portrait, en mm , taille A5)
$pdf = new FPDF('P', 'mm', 'A5');

//Ajouter une nouvelle page
$pdf->AddPage();

// entete
$pdf->Image('images/logo.png', 10, 5, 30, 20);

// Saut de ligne
$pdf->Ln(18);


// Police Arial gras 16
$pdf->SetFont('Arial', 'B', 16);

// Titre
$pdf->Cell(0, 10, iconv('UTF-8','windows-1252', 'Lettre à ' ). $confrere , 'TB', 1, 'C');



// Saut de ligne
$pdf->Ln(5);

// Début en police Arial normale taille 10

$pdf->SetFont('Arial', '', 10);
$h = 7;
$retrait = "      ";
$txt="Cher confrère,\nEn ce jour du ". $dateJ . ",\npermettez-moi de vous adresser le(la) patient(e) :\n";
$pdf->Write($h,iconv('UTF-8','windows-1252',$txt ));

/*
 susnommé(e) <nom>, né(e) le <dateN>, qui s'est présenté pour <motif>, je vous le confie pour <raison>
Respectueusement */
$pdf->SetFont('', 'BIU');
$pdf->Write($h, $nom_prenom );

//Ecriture normal 
$pdf->SetFont('', '');

$pdf->Write($h, " porteur de CIN N " . $cin . "\n");

$pdf->Write($h, iconv('UTF-8','windows-1252', $contenu) . " \n\n\n");
// Décalage de 20 mm à droite
$pdf->Cell(20);
$pdf->Cell(80, 8, "Le docteur ", 1, 1, 'C');

// Décalage de 20 mm à droite
$pdf->Cell(20);
$pdf->Cell(80, 5, "Tahiri Driss", 'LR', 1, 'C');
$pdf->Cell(20);
$pdf->Cell(80, 5, ' ', 'LR', 1, 'C'); // LR Left-Right
$pdf->Cell(20);
$pdf->Cell(80, 5, ' ', 'LR', 1, 'C');
$pdf->Cell(20);
$pdf->Cell(80, 5, ' ', 'LR', 1, 'C');
$pdf->Cell(20);
$pdf->Cell(80, 5, ' ', 'LRB', 1, 'C'); // LRB : Left-Right-Bottom (Bas)

//Afficher le pdf
$pdf->Output('', '', true);}
?>