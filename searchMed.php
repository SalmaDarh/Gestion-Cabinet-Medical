<?php include("header.php");?>
<?php include('navbar.php')?>
<?php include('sidebarMed.php')?>
<script src="https://kit.fontawesome.com/037ceaa57e.js" crossorigin="anonymous"></script>
<main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4">
          <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="accueilMed.php">Accueil</a></li>
    <li class="breadcrumb-item"><a href="patientMed.php">Patients</a></li>
    <li class="breadcrumb-item active" aria-current="page">Chercher une fiche</li>
  </ol>
        </nav>
        <div class="bottom">         
      <form method="post" action="searchMed.php" >
      <h1 style=" display:inline;">Liste des patients</h1>
      <input class="form-control " name="search" style="display:inline; margin-left:300px;width:200px; margin-right:20px;"type="text" placeholder="Chercher un patient" aria-label="Search">
      <button type="submit" name="submit" class="btn btnretour" style="display:inline;">Chercher</button>
      <style> .btnretour:hover {background-color: gray;} 
        .btnretour{ background-color : #0d6efd;
          color: white; border : solid 2px; border-color: gray;
          length:50px; width:120px;
          }
          .bottom{margin-bottom : 25px;}
</style>

</form>
</div>
        <?php   if (isset($_POST["submit"])) {
            $str = $_POST["search"];
            include ('database.php');
            $pdo = Database::connect();
           $sql = "SELECT * FROM patients WHERE (nom like '%$str%') or (prenom like '%$str%') or (cin like '%$str%') ORDER BY id DESC";
           echo' <table class="table table-striped table-bordered">
           <thead>
             <tr>
               <th>CIN</th>
               <th>NOM</th>
               <th>PRENOM</th>
             </tr>
           </thead>
           <tbody> ';
           foreach ($pdo->query($sql) as $row) {
                    echo '<tr>';
                    echo '<td>'. $row['cin'] . '</td>';
                    echo '<td>'. $row['nom'] . '</td>';
                    echo '<td>'. $row['prenom'] . '</td>';
                    echo '<td width=250>';
                    echo '<a class="btn" title="Voir la fiche patient" href="readPatientMed.php?id='.$row['id'].'" ><i class="fas fa-file-medical fa-2x"></i></i></a>';
                    echo ' ';
                    echo '</tr>';
           }
           Database::disconnect();}

          ?>
        </main>
                  
                 