<?php include('header.php')?> 
<?php include('navbar.php')?>
<?php include('sidebarSec.php')?>
<script src="https://kit.fontawesome.com/037ceaa57e.js" crossorigin="anonymous"></script>
<main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4 mainy">
          <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="accueilSec.php">Accueil</a></li>
    
  </ol>
        </nav>

        <div class="bouton ">
  <p class="row">
   <a href="createpatient.php" class="patients">+Nouveau Patient</a>
   <a href="calenderSec.php" class="calendrier" >Calendrier</a>
</p>
   
   <p class="row">
   <a href="factureSec.php" class="facture">Factures</a>
   <a href="index.php"class="quitter">Quitter</a>
 </p>
</div>

        </main>

        <style>
          .quitter{background-image: url("images/logout.png"); background-repeat: no-repeat; background-position :280px 50px; ;background-size: 80px auto;}
          .patients{background-image: url("images/plus-plus.png"); background-repeat: no-repeat; background-position :280px 50px; ;background-size: 75px auto;}
          .facture{background-image: url("images/facture.png"); background-repeat: no-repeat; background-position :280px 50px; ;background-size: 80px auto;}
          .calendrier{background-image: url("images/calendrier.png"); background-repeat: no-repeat; background-position :280px 50px; ;background-size: 80px auto;}
          
        .bouton a {
          display:inline-block;

width:400px;
line-height:150px;

vertical-align:middle;
background-color : white;
color:#0d6efd ;
border:#0d6efd solid 7px;
border-radius : 20px;

font-size : 20pt;
text-decoration:none;
margin-left : 80px;
margin-top: 20px

}
.bouton a:hover {
background-color : #b2b2b2;
}
</style>
