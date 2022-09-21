<?php include('header.php')?> 
<?php include('navbar.php')?>
<?php include('sidebarSec.php')?>
<main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="accueilSec.php">Accueil</a></li>
      <li class="breadcrumb-item active" aria-current="page">Calendrier</li>
    </ol>
  </nav>
  <?php include("MedAppRDV/calendar.php");?>
</main>
