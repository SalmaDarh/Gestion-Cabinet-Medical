<?php include('header.php')?> 
<?php include('navbar.php')?>
<?php include('sidebarMed.php')?>
<main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4">
          <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="accueilMed.php" >Accueil</a></li>
    <li class="breadcrumb-item"><a href="patientMed.php">Patients</a></li>
    <li class="breadcrumb-item active" aria-current="page">Fiches</li>
  </ol>
        </nav>
        
        <?php include("readbis.php")?>
        <a class="btn btnretour " href="patientMed.php" >Retour</a>
                       
                       <style> .btnretour:hover {background-color: gray;} 
                               .btnretour{margin-left:900px; background-color : #0d6efd;
                                 color: white; border : solid 2px; border-color: gray;
                                 length:50px; width:120px;
                                 }
                       </style>
        
       
       
                       

        </main>
