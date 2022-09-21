<?php include('header.php')?> 
<?php include('navbar.php')?>
<?php include('sidebarMed.php')?>
<style>
  .fa-file-medical:before {
      content: "\f477";
  }
  .fa, .fas {
    font-weight: 900;
}
<style>
.fa, .far, .fas {
    font-family: "Font Awesome 5 Free";
}
<style>
.fa-2x {
    font-size: 2em;
}
<style>
.fa, .fab, .fad, .fal, .far, .fas {
    -moz-osx-font-smoothing: grayscale;
    -webkit-font-smoothing: antialiased;
    display: inline-block;
    font-style: normal;
    font-variant: normal;
    text-rendering: auto;
    line-height: 1;
}
</style>
<main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="accueilMed.php">Accueil</a></li>
      <li class="breadcrumb-item active" aria-current="page">Compte rendu</li>
    </ol>
  </nav>

  <!DOCTYPE html>
<html lang="en">
<body>
    
    <div class="container">
    <div text-align="center">
     
                <div class="span10 offset1">
                    <div class="row">
                        <h3>Ecrire un nouveau compte rendu</h3>
                    </div>
                    <form class="form-horizontal" action="CompteRenduPost.php" method="post">
                      <input type="hidden" name="patientId" value="<?php echo $_GET["id"] ?>" />
                      <div class="control-group <?php echo !empty($contenuError)?'error':'';?>">
                        <label class="control-label"><b>Compte rendu</b></label>
                        <div class="controls">
                          <input type="hidden" name="isNew" value="true" />
                            <textarea name="compteRenduContenu" type="text" class="form-control" placeholder="Compte rendu" value="<?php echo !empty($contenu)?$contenu:'';?>"></textarea>
                            <?php if (!empty($contenuError)): ?>
                                <span class="help-inline"><?php echo $contenuError;?></span>
                            <?php endif; ?>

                        </div>
                      </div>
                <div class="control-group ">
                    <label class="control-label"><b>Date de compte rendu</b></label>
                    <div class="controls">
                        <input class="form-control" name="compteRenduDate" type="date"  placeholder="Date" value="<?php echo !empty($dateCompteRendu)?$dateCompteRendu:'';?>">
                    </div>
                    </div><br/>
                    <br/>
                    <button type="submit" class="btn btn-info" id="blue" name="CompteRendu"> Ajouter </button>
                    <br/>
                    <br/>
                    <style>
                      #blue{margin-top : 15px; margin-left : 850px;length:50px; width:120px;}
                    </style>





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
    
    $sql = $conn->prepare("SELECT * FROM compte_rendu where patient_id=?");
    $patientId = $_GET["id"];
    $sql->bind_param("i", $patientId);
    $sql->execute();
    $result = $sql->get_result();
    
    if ($result->num_rows > 0) {        
      echo "<table class='table table-striped table-bordered'><tr><th>Date</th><th>Compte rendu</th><th>Modifier</th></tr>";
      while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["compte_rendu_date"] . "</td>
        <td>" . $row["compte_rendu_contenu"] . "</td>
        <td><a title='modifier' href='modifierComptRendu.php?id=" . $row["compte_rendu_id"] ."'>
        modifier
        
        </a></td></tr>";
        
      }
      echo "</table>";     
    } else {
      echo "<div>0 results</div>";
    }

    $conn->close();
?>


</main>