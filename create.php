<?php
     
    require 'database.php';
 
    if ( !empty($_POST)) {
        // keep track validation errors
        $cinError = null;
        $nomError = null;
        $prenomError = null;
        $numeroError= null;

         
        // keep track post values
        $cin = $_POST['cin'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $numero=$_POST['numero'];
        $dateNaissance=$_POST['dateNaissance'];
        $adresse=$_POST['adresse'];
        $sexe=$_POST['sexe'];
        $motif=$_POST['motif'];
        $poids=$_POST['poids'];
        $premierRdv=$_POST['premierRdv'];

         
        // validate input
        $valid = true;
        if (empty($cin)) {
            $nameError = 'Entrez CIN';
            $valid = false;
        }
         
        if (empty($nom)) {
            $nomError = 'Entrer un nom';
            $valid = false;
        } 
         
        if (empty($prenom)) {
            $prenomError = 'Entrez un prenom';
            $valid = false;
        }

        

       
         
        // insert data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO patients (cin,nom,prenom,numero,dateNaissance,adresse,sexe,motif,poids,premierRdv) values(?, ?, ?,?,?,?,?,?,?,?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($cin,$nom,$prenom,$numero,$dateNaissance,$adresse,$sexe,$motif,$poids,$premierRdv));
            Database::disconnect();
            header("Location: patientSec.php");
        }
    }
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
 
<body>
    
    <div class="container">
    <div text-align="center">
     
                <div class="span10 offset1">
                    <div class="row">
                        <h3>Ajouter un patient</h3>
                    </div>
             
                    <form class="form-horizontal" action="create.php" method="post">

                      <div class="control-group <?php echo !empty($nameError)?'error':'';?>">
                        <label class="control-label"><b>CIN</b></label>
                        <div class="controls">
                            <input name="cin" type="text" class="form-control" placeholder="CIN" value="<?php echo !empty($cin)?$cin:'';?>">
                            <?php if (!empty($cinError)): ?>
                                <span class="help-inline"><?php echo $cinError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>

                      <div class="control-group <?php echo !empty($nomError)?'error':'';?>">
                        <label class="control-label"><b>NOM</b></label>
                        <div class="controls">
                            <input name="nom" type="text" class="form-control" placeholder="NOM" value="<?php echo !empty($nom)?$nom:'';?>">
                            <?php if (!empty($nomError)): ?>
                                <span class="help-inline"><?php echo $nomError;?></span>
                            <?php endif;?>
                        </div>
                      </div>

                      <div class="control-group <?php echo !empty($prenomError)?'error':'';?>">
                        <label class="control-label"><b>PRENOM</b></label>
                        <div class="controls">
                            <input class="form-control" name="prenom" type="text"  placeholder="PRENOM" value="<?php echo !empty($prenom)?$prenom:'';?>">
                            <?php if (!empty($prenomError)): ?>
                                <span class="help-inline"><?php echo $prenomError;?></span>
                            <?php endif;?>
                        </div>
                      </div>

                      <div class="control-group <?php echo !empty($numeroError)?'error':'';?>">
                        <label class="control-label"><b>NUMERO<b></label>
                        <div class="controls">
                            <input class="form-control" name="numero" type="text"  placeholder="NUMERO" value="<?php echo !empty($numero)?$numero:'';?>">
                            <?php if (!empty($numeroError)): ?>
                                <span class="help-inline"><?php echo $numeroError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>

                      <div class="control-group ">
                        <label class="control-label"><b>Date Naissance</b></label>
                        <!-- <input class="form-control" id="date" type="date" value="2017-06-01"> -->

                        <div class="controls">
                            <input class="form-control" name="dateNaissance" type="date"  placeholder="Date Naissance" value="<?php echo !empty($dateNaissance)?$dateNaissance:'';?>">
                        </div>
                        
                      </div>

                      <div class="control-group <?php echo !empty($adresseError)?'error':'';?>">
                        <label class="control-label"><b>ADRESSE</b></label>
                        <div class="controls">
                            <input class="form-control" name="adresse" type="text" placeholder="ADRESSE" value="<?php echo !empty($adresse)?$adresse:'';?>">
                           <!--
                            <?php if (!empty($adresseError)): ?>
                                <span class="help-inline"><?php echo $adresseError;?></span>
                            <?php endif; ?>
                            -->
                        </div>
                      </div>

                      <div class="control-group <?php echo !empty($sexeError)?'error':'';?>">
                        <label class="control-label"><b>SEXE</b></label>
                        <div class="controls">
                        <select class="form-control" name="sexe" type="select" value="<?php echo !empty($sexe)?$sexe:'';?>">
                        
                        <option value="" disabled selected>Choisissez une option..</option>
                             <option value="Femme">Femme</option>
                              <option value="Homme">Homme</option>
                        </select>
                        
                        </div>
                      </div>

                      <div class="control-group <?php echo !empty($motifError)?'error':'';?>">
                        <label class="control-label"><b>MOTIF</b></label>
                        <div class="controls">
                            <input class="form-control" name="motif" type="text"  placeholder="MOTIF" value="<?php echo !empty($motif)?$motif:'';?>">
                            <!--
                            <?php if (!empty($motifError)): ?>
                                <span class="help-inline"><?php echo $motifError;?></span>
                            <?php endif; ?>
                            -->
                        </div>

                      </div>
                      <div class="control-group <?php echo !empty($poidsError)?'error':'';?>">
                        <label class="control-label"><b>POIDS</b></label>
                        <div class="controls">
                            <input class="form-control" name="poids" type="text"  placeholder="POIDS" value="<?php echo !empty($poids)?$poids:'';?>">
                            <!--
                            <?php if (!empty($poidsError)): ?>
                                <span class="help-inline"><?php echo $poidsError;?></span>
                            <?php endif; ?>
                            -->
                        </div>
                      </div>

                      <div class="control-group <?php echo !empty($premierRdvError)?'error':'';?>">
                        <label class="control-label"><b>RDV</b></label>
                        <div class="controls">
                            <input class="form-control" name="premierRdv" type="date"  placeholder="RDV" value="<?php echo !empty($premierRdv)?$premierRdv:'';?>">
                            <!--
                            <?php if (!empty($premierRdvError)): ?>
                                <span class="help-inline"><?php echo $premierRdvError;?></span>
                            <?php endif; ?>
                            -->
                        </div>
                      </div>
                         
                      <div class="form-actions">
                          <button type="submit" class="btn btn-info" id="blue">Créer</button>
                          <a class="btn btn-default retour" href="patientSec.php">Retour</a>
                        </div>
                    </form>
                </div>
<style>
   
                     #blue{background-color: #0d6efd;margin-top : 15px; margin-left : 730px;length:50px; width:120px;}
                     .retour{background-color :gray;margin-top : 15px; length:50px; width:120px;}
                 </style>
    </div>
    </div> <!-- /container --> 
  </body>
</html>


