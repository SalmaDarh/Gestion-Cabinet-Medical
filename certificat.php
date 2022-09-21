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


<?php include('header.php')?> 
<?php include('navbar.php')?>
<?php include('sidebarMed.php')?>
<main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4">
          <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="accueilMed.php">Accueil</a></li>
    <li class="breadcrumb-item"><a href="patientMed.php">Patients</a></li>
    <li class="breadcrumb-item active" aria-current="page">Certificat médical</li>
  </ol>
        </nav>
<form  class="form-horizontal" method="post" action="certificatBis.php">

  <div class="form-row">
  <div class="form-group col-md-4">
   
    <label for="inputEmail4">CIN</label>
      <input type="text" class="form-control" name="cind" id="inputEmail4" disabled value="<?php echo $data['cin'];?>" >
  </div>

    <div class="form-group col-md-4">
      <label for="inputZip">Date</label>
      <input type="text" class="form-control" id="inputAddress2" disabled value=" <?php echo $data['premierRdv'];?>">
    </div>
  </div>

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
    <label for="inputname">Date début</label>
        <input type="date" name="dateD"class="form-control" >
  </div>
</div>

<div class="form-row">  
  <div class="form-group col-md-4">
    <label for="inputname">Date fin</label>
        <input type="date" name="dateF"class="form-control" >
  </div>
</div>

    <div class="form-row">
  <div class="form-group col-md-4">
        <label for="cin">Confirmez le CIN du patient</label>
        <input type="text" name="cin" class="form-control">
 
  </div>
         </div> 
<button type="submit" class="btn btn-primary" name="submit">Generer le certificat</button>
        </form>
</main>



<style> .btnretour:hover {background-color: gray;} 
        .btnretour{ background-color : #0d6efd;
          color: white; border : solid 2px; border-color: gray;
          length:50px; width:120px;
          }
          .bottom{margin-bottom : 25px;}
</style>