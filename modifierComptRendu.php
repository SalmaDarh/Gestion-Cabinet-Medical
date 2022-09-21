<?php include('header.php')?> 
<?php include('navbar.php')?>
<?php include('sidebarMed.php')?>
<style>
  .fa-file-medical:before {
      content: "\f477";
  }
</style>
<main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="accueilSec.php">Accueil</a></li>
      <li class="breadcrumb-item"><a href="CompteRendu.php">Compte rendu</a></li>
      <li class="breadcrumb-item active" aria-current="page">Modification Compte rendu</li>



    </ol>
  </nav>

  <!DOCTYPE html>
<html lang="en">
<body>
    

<?php
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
    
    $sql = "SELECT * FROM compte_rendu where compte_rendu_id=" . $_GET["id"];
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    
    $patient_id = $row["patient_id"];
    $compte_rendu_date = $row["compte_rendu_date"];
    $compte_rendu_contenu = $row["compte_rendu_contenu"];

    $conn->close();
?>

    <div class="container">
    <div text-align="center">
     
                <div class="span10 offset1">
                    <div class="row">
                        <h3>Modifier le compte rendu</h3>
                    </div>
                    <form class="form-horizontal" action="CompteRenduPost.php" method="post">
                      <input type="hidden" name="isNew" value="false" />
                      <input type="hidden" name="patientId" value="<?php echo $patient_id ?>" />
                      <input type="hidden" name="compteRenduContenuID" value="<?php echo $_GET["id"] ?>" />
                      <div class="control-group <?php echo !empty($contenuError)?'error':'';?>">
                        <label class="control-label"><b>Compte rendu</b></label>
                        <div class="controls">
                            <textarea name="compteRenduContenu" type="text" class="form-control" placeholder="Compte rendu"><?php echo $compte_rendu_contenu;?></textarea>
                            <?php if (!empty($contenuError)): ?>
                                <span class="help-inline"><?php echo $contenuError;?></span>
                            <?php endif; ?>

                        </div>
                      </div>
                <div class="control-group ">
                    <label class="control-label"><b>Date de compte rendu</b></label>
                    <div class="controls">
                        <input class="form-control" name="compteRenduDate" type="date"  placeholder="Date" value="<?php echo $compte_rendu_date;?>">
                    </div>
                    </div>
                    <br/>
                    <br/>
                    <button type="submit" class="btn btn-info" id="blue" name="CompteRendu"> Enregistrer </button>
                    <br/>
                    <br/>
                    <style>
                      #blue{margin-top : 15px; margin-left : 850px;length:50px; width:120px;}
                    </style>






















</main>