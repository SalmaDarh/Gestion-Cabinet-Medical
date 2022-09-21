
<?php
    require 'database.php';
 
    $id = null;


    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( null==$id ) {
        header("Location: patientSec.php");
    }
     
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
         
        // validate input class="form-control" 
        $valid = true;
        if (empty($cin)) {
            $cinError = 'Entrez un CIN';
            $valid = false;
        }
         
        if (empty($nom)) {
            $nomError = 'Entrez un nom';
            $valid = false;
        } 
         
        if (empty($prenom)) {
            $prenomError = 'Entrez un prenom';
            $valid = false;
        }

        

       
         
        // update data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE patients  set cin = ?, nom = ?, prenom =?,numero=?,dateNaissance=?,adresse =?,sexe=?,motif=?,poids=?,premierRdv =? WHERE id = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($cin,$nom,$prenom,$numero,$dateNaissance,$adresse,$sexe,$motif,$poids,$premierRdv,$id));
            Database::disconnect();
            header("Location: patientSec.php");
        }
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM patients where id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        $cin = $data['cin'];
        $nom = $data['nom'];
        $prenom = $data['prenom'];
        $numero=$data['numero'];
        $dateNaissance=$data['dateNaissance'];
        $adresse=$data['adresse'];
        $sexe=$data['sexe'];
        $motif=$data['motif'];
        $poids=$data['poids'];
        $premierRdv=$data['premierRdv'];
        Database::disconnect();
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
    <div class="container ">
     <div text-align="center">
                <div class="span10 offset1">
                    <div class="row">
                        <h3>Modifier patient</hh3>
                    </div>
             
                    <form class="form-horizontal" action="update.php?id=<?php echo $id?>" method="post">

                      <div class="control-group <?php echo !empty($cinError)?'error':'';?>">
                        <label class="control-label"><b>CIN</b></label>
                        <div class="controls">
                            <input class="form-control"  name="cin" type="text"  placeholder="CIN" value="<?php echo !empty($cin)?$cin:'';?>">
                            <?php if (!empty($cinError)): ?>
                                <span class="help-inline"><?php echo $cinError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>

                      <div class="control-group <?php echo !empty($nomError)?'error':'';?>">
                        <label class="control-label"><b>NOM</b></label>
                        <div class="controls">
                            <input class="form-control"  name="nom" type="text" placeholder="NOM" value="<?php echo !empty($nom)?$nom:'';?>">
                            <?php if (!empty($nomError)): ?>
                                <span class="help-inline"><?php echo $nomError;?></span>
                            <?php endif;?>
                        </div>
                      </div>

                      <div class="control-group <?php echo !empty($prenomError)?'error':'';?>">
                        <label class="control-label"><b>PRENOM</b></label>
                        <div class="controls">
                            <input class="form-control"  name="prenom" type="text"  placeholder="PRENOM" value="<?php echo !empty($prenom)?$prenom:'';?>">
                            <?php if (!empty($prenomError)): ?>
                                <span class="help-inline"><?php echo $prenomError;?></span>
                            <?php endif;?>
                        </div>
                      </div>

                      <div class="control-group <?php echo !empty($numeroError)?'error':'';?>">
                        <label class="control-label"><b>NUMERO</b></label>
                        <div class="controls">
                        <input class="form-control"  name="numero" type="text"  placeholder="NUMERO" value="<?php echo !empty($numero)?$numero:'';?>">
                            <?php if (!empty($numeroError)): ?>
                                <span class="help-inline"><?php echo $numeroError;?></span>
                            <?php endif;?>
                        </div>
                      </div>

                      <div class="control-group <?php echo !empty($dateNaissanceError)?'error':'';?>">
                        <label class="control-label"><b>Date Naissance</b></label>
                        <div class="controls">
                        <input class="form-control"  name="dateNaissance" type="text"  placeholder="Date Naissance" value="<?php echo !empty($dateNaissance)?$dateNaissance:'';?>">
                            
                        </div>
                      </div>

                      <div class="control-group <?php echo !empty($adresseError)?'error':'';?>">
                        <label class="control-label"><b>ADRESSE</b></label>
                        <div class="controls">
                        <input class="form-control"  name="adresse" type="text"  placeholder="ADRESSE" value="<?php echo !empty($adresse)?$adresse:'';?>">
                            
                        </div>
                      </div>

                     

                      <div class="control-group <?php echo !empty($sexeError)?'error':'';?>">
                        <label class="control-label"><b>SEXE</b></label>
                        <div class="controls">
                        <select class="form-control" name="sexe" type="select" value="<?php echo !empty($sexe)?$sexe:'';?>">
                        
                        <option value="" disabled >Choisissez une option..</option>
                              <option value="<?php echo !empty($sexe)?$sexe:'';?>"><?php echo !empty($sexe)?$sexe:'';?></option>
                             <option value="<?php  if(!empty($sexe) && $sexe=="Femme") {echo "Homme";} elseif(!empty($sexe) && $sexe=="Homme"){ echo "Femme";}else echo 'Femme';?>">
                             <?php  if(!empty($sexe) && $sexe=="Femme") {echo "Homme";} elseif(!empty($sexe) && $sexe=="Homme"){ echo "Femme";}else echo 'Femme';?>
                            </option>
                            <option value="<?php  if(empty($sexe) ){echo "Homme";} ?>">
                             <?php  if(empty($sexe) ) {echo "Homme";} ?>
                            </option>
                              
                        </select>
                        
                        </div>
                      </div>
                     

                      <div class="control-group <?php echo !empty($motifError)?'error':'';?>">
                        <label class="control-label"><b>MOTIF</b></label>
                        <div class="controls">
                        <input class="form-control"  name="motif" type="text"  placeholder="MOTIF" value="<?php echo !empty($motif)?$motif:'';?>">
                            
                        </div>
                      </div>

                      <div class="control-group <?php echo !empty($poidsError)?'error':'';?>">
                        <label class="control-label"><b>POIDS</b></label>
                        <div class="controls">
                        <input class="form-control"  name="poids" type="text"  placeholder="POIDS" value="<?php echo !empty($poids)?$poids:'';?>">
                            
                        </div>
                      </div>

                      <div class="control-group <?php echo !empty($premierRdvError)?'error':'';?>">
                        <label class="control-label"><b>RDV</b></label>
                        <div class="controls">
                        <input class="form-control"  name="premierRdv" type="date"  placeholder="RDV" value="<?php echo !empty($premierRdv)?$premierRdv:'';?>">
                            
                        </div>
                      </div>



                      <div class="form-actions">
                          <button type="submit" id="blue" class="btn btnretour">Modifier</button>
                          <a class="btn btnretour"  href="patientSec.php" >Retour</a>
                        </div>
                    </form>
                </div>
                </div>
                <style> 
                
                       
                       .btnretour:hover {background-color: gray;} 
                               .btnretour{background-color : #0d6efd;
                                 color: white; border : solid 2px; border-color: gray;
                                 length:50px; width:120px;
                                 margin-top : 15px; 
                                 }
                       
                     #blue{margin-left:700px}
                     
                     </style>
    </div> <!-- /container -->
  </body>
</html>