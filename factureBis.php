
<?php
require("fonctions.php");
    if (isset($_POST["submit"])) {
        $str = $_POST["facture"];
        include ('database.php');
        $intervention = $_POST['checkboxes'];
        $dateAuj=date("Y-m-d");
$montantTotal=0;
foreach ($intervention as $inter){ 
   if($inter=="Consultation") $montantTotal+=350;
   if($inter=="Psychotherapie") $montantTotal+=500;
   if($inter=="mindfulness") $montantTotal+=600;
   if($inter=="emdr") $montantTotal+=600;}
$pdo = Database::connect();

$identite_patients = $pdo->query("SELECT * FROM patients WHERE (cin like '%$str%')");
$patients = $identite_patients->fetch();

$identite_fac = $pdo->query("SELECT * FROM factures WHERE (cin like '%$str%')");
$fac = $identite_fac->fetch();

$nom_prenom = strtoupper($patients['nom'] . "  " . $patients['prenom']);

$date_naiss = $patients['dateNaissance'];

$cin = strtoupper($patients['cin']);

$rdv = $patients['premierRdv'];

$sexe = strtoupper($patients['sexe']);



$factureBis="INSERT into factures (cin,dateAuj,montant) values (?,?,?)";
$q = $pdo->prepare($factureBis);
$q->execute(array($cin,$dateAuj,$montantTotal));
           
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
$pdf->Cell(0, 10, 'Facture' . iconv('UTF-8','windows-1252',' N°2022/15'), 'TB', 1, 'C');
$pdf->Cell(0, 10, '', 0, 1, 'C');

// Saut de ligne
$pdf->Ln(4);

// Début en police Arial normale taille 10

$pdf->SetFont('Arial', '', 10);
$h = 7;
$retrait = "      ";

$pdf->Write($h,"Cabinet du docteur Tahiri Alaoui Driss \nAdresse : Avenue Chohadaa " . iconv('UTF-8','windows-1252','Béni Mellal')." \nTel : 0656457887 \n\n");
$pdf->Write($h,'');
$pdf->Write($h, "Facture du patient : ");

//Ecriture en Gras-Italique-Souligné(U)
$pdf->SetFont('', 'BIU');
$pdf->Write($h, $nom_prenom);
$pdf->setFont('','');
$pdf->Write($h," porteur de CIN N : ");
$pdf->SetFont('', 'BIU');
$pdf->Write($h, $cin );
//Ecriture normal 
$pdf->SetFont('', '');
$consultation="Consultation..............................................................................................350DH\n";
   $injection="Séance de psychotherapie.......................................................................500DH\n";
        $ana1="Mindfulness...............................................................................................600DH\n";
        $ana2="Eye movement desensitization and reprocessing(EMDR)........................600DH\n";
        $tot="\nTotal...........................................................................................................";
//$pdf->Write($h, $retrait . "Né (e) Le : " . $date_naiss . "\n")
$pdf->Write($h,"\nInterventions : \n");
foreach ($intervention as $inter){ 
    if($inter=="Consultation") $pdf->Write($h, iconv('UTF-8','windows-1252',$consultation));
   if($inter=="Psychotherapie")  $pdf->Write($h, iconv('UTF-8','windows-1252',$injection));
   if($inter=="mindfulness") $pdf->Write($h,$ana1);
   if($inter=="emdr")  $pdf->Write($h,$ana2);}
   


$pdf->Write($h,$tot. $montantTotal . "DH\n");
// Décalage de 20 mm à droite
$pdf->Write($h, "\n\n");
$pdf->Cell(20);
$pdf->Cell(80, 8, "Le docteur ", 1, 1, 'C');
// Décalage de 20 mm à droite
$pdf->Cell(20);
$pdf->Cell(80, 5, "Tahiri Driss \n Le ". $dateAuj, 'LR', 1, 'C');
$pdf->Cell(20);
$pdf->Cell(80, 5, ' ', 'LR', 1, 'C'); // LR Left-Right
$pdf->Cell(20);
$pdf->Cell(80, 5, ' ', 'LR', 1, 'C');
$pdf->Cell(20);
$pdf->Cell(80, 5, ' ', 'LR', 1, 'C');
$pdf->Cell(20);
$pdf->Cell(80, 5, ' ', 'LRB', 1, 'C'); // LRB : Left-Right-Bottom (Bas)

//Afficher le pdf
$pdf->Output('', '', true);
header('Location:accueilSec.php');
}
?>