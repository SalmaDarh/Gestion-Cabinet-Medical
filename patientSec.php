<?php include('header.php')?> 
<?php include('navbar.php')?>
<?php include('sidebarSec.php')?>
<main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4">
          <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="accueilSec.php">Accueil</a></li>
    <li class="breadcrumb-item active" aria-current="page">Patients</li>
  </ol>
        </nav>
        <div class="bottom">         
      <form method="post" action="search.php" >
      <h1 style=" display:inline;">Liste des patients</h1>
      <input class="form-control " name="search" style="display:inline; margin-left:300px;width:200px; margin-right:20px;"type="text" placeholder="Chercher un patient" aria-label="Search">
      <button type="submit" name="submit" class="btn btn-primary btnretour" style="display:inline;">Chercher</button>
      <style> .btnretour:hover {background-color: gray;} 
        .btnretour{ background-color : #0d6efd;
          color: white; border : solid 2px; border-color: gray;
          length:50px; width:120px;
          }
          .bottom{margin-bottom : 25px;}
</style>

</form>
</div>

     
  
        <?php include("indexx.php")?>
        </main>
