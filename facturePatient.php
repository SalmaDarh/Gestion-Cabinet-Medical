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
<?php include('header.php')?> 
<?php include('navbar.php')?>
<?php include('sidebarSec.php')?>
<main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4">
          <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="accueilSec.php">Accueil</a></li>
    <li class="breadcrumb-item"><a href="factureSec.php">Factures</a></li>
    <li class="breadcrumb-item active" aria-current="page">Générer une facture</li>
  </ol>
        </nav>
<form  class="form-horizontal" method="post" action="factureBis.php" >
  <div class="form-row">
    <div class="form-group col-md-4">
        <label for="inputAddress">Prénom</label>
        <input type="text" class="form-control" id="inputAddress" disabled value="<?php echo $data['prenom'];?>">  
    </div>
    <div class="form-group col-md-4">
      <label for="inputPassword4">Nom</label>
      <input type="text" class="form-control" id="inputPassword4" disabled value=" <?php echo $data['nom'];?>">  
    </div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-4">
   
    <label for="inputEmail4">CIN</label>
      <input type="text" class="form-control" name="cind" id="inputEmail4" disabled value="<?php echo $data['cin'];?>" >
  </div>

    <div class="form-group col-md-4">
      <label for="inputZip">Date du Rendez-vous</label>
      <input type="text" class="form-control" id="inputAddress2" disabled value=" <?php echo $data['premierRdv'];?>">
    </div>
  </div>
   
      <!--checkboxes-->   
      <label for="checkbox">Interventions :</label>
  <br></br>
      <div id="checkbox">
         <div class="form-group row">
    <div class="col-sm-10 ">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="gridCheck1" name="checkboxes[]" value="Consultation">
        <label class="form-check-label" for="gridCheck1">
          Consultation (350DH)
        </label>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-10 ">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="gridCheck2" name="checkboxes[]"  value="Psychotherapie">
        <label class="form-check-label" for="gridCheck2">
          Séance de Psychotherapie (500DH)
        </label>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-10 ">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="gridCheck3" name="checkboxes[]" value="mindfulness">
        <label class="form-check-label" for="gridCheck3">
        Mindfulness (600DH)
        </label>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-10 ">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="gridCheck4" name="checkboxes[]" value="emdr">
        <label class="form-check-label" for="gridCheck4">
           EMDR(600DH)
        </label>
      </div>
    </div>
  </div>
  </div>
  <!--fin checkboxes-->
  <div class="form-row">  
  <div class="form-group col-md-4">

  
<label for="facture">Confirmez le CIN du patient</label>
        <input type="text" name="facture" class="form-control">
  </div>
 
         </div> 
<button type="submit" class="btn btn-primary" name="submit">Générer la facture </button>
        </form>
</main>



<style> .btnretour:hover {background-color: gray;} 
        .btnretour{ background-color : #0d6efd;
          color: white; border : solid 2px; border-color: gray;
          length:50px; width:120px;
          }
          .bottom{margin-bottom : 25px;}
</style>