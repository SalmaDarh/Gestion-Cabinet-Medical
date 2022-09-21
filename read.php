<?php
include("header.php");
    require 'database.php';
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( null==$id ) {
        header("Location: index.php");
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM patients where id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
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
   <h1> Fiche patient</h1>
   <!-- code by ouma -->
         
  <div class="form-row">
    <div class="form-group col-md-6">
    <label for="inputAddress">Prénom</label>
    <input type="text" class="form-control" id="inputAddress" disabled value="<?php echo $data['prenom'];?>">  
      
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Nom</label>
      <input type="text" class="form-control" id="inputPassword4" disabled value=" <?php echo $data['nom'];?>">
      
    </div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-4">
   
    <label for="inputEmail4">CIN</label>
      <input type="text" class="form-control" id="inputEmail4" disabled value="<?php echo $data['cin'];?>" >
  </div>
  <div class="form-group col-md-4">
    <label for="inputAddress2">Numéro</label>
    <input type="text" class="form-control" id="inputAddress2" disabled value="<?php echo $data['numero'];?>">
  </div>
  <div class="form-group col-md-4">
    <label for="inputAddress">Date de naissance</label>
    <input type="text" class="form-control" id="inputAddress" disabled value=" <?php echo $data['dateNaissance'];?>">
  </div>
</div>
  <div class="form-row"> 
  <div class="form-group col-md-4">
    <label for="inputAddress">Adresse</label>
    <input type="text" class="form-control" id="inputAddress" disabled value="   <?php echo $data['adresse'];?>">
  </div>
  <div class="form-group col-md-4">
    <label for="inputAddress2">Sexe</label>
    <input type="text" class="form-control" id="inputAddress2" disabled value=" <?php echo $data['sexe'];?>">
  </div>
  <div class="form-group col-md-4">
    <label for="inputAddress2">Poids</label>
    <input type="text" class="form-control" id="inputAddress2" disabled value=" <?php echo $data['poids'];?>">
  </div>
</div>

<div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputZip">Premier Rendez-vous</label>
      <input type="text" class="form-control" id="inputAddress2" disabled value=" <?php echo $data['premierRdv'];?>">
    </div>
  </div>
<div class="form-row">  
<div class="form-group col-md-6">
   <label for="inputAddress2">Motif</label>
    <input type="text" class="form-control" id="inputAddress2" disabled value=" <?php echo $data['motif'];?>">
</div>
</div>
  
                 
     <!-- /container -->
  </body>
</html>