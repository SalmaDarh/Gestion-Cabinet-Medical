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
        <div class="bottom">         
      <form method="post" action="searchFacture.php" >
      <h1 style=" display:inline;">Factures des patients</h1>
      <input class="form-control " name="search" style="display:inline; margin-left:300px;width:200px; margin-right:20px;"type="text" placeholder="Chercher un patient" aria-label="Search">
      <button type="submit" name="submit" class="btn btn-primary btnretour" style="display:inline;">Chercher</button>
     </form>
</div>
      
		<?php include("facturePatient.php"); ?>
		<form  class="form-horizontal" method="post" action="factureBis.php">
          <input type="text" name="facture" >
          <button type="submit" class="btn btn-primary" name="submit"><a href="index.php">Générer la facture</a></button>
        </form>

        </main>


        