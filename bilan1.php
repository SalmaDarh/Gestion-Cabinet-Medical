<?php include('header.php')?> 
<?php include('navbar.php')?>
<?php include('sidebarMed.php')?>
<main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4">
          <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="accueilMed.php">Accueil</a></li>
    <li class="breadcrumb-item active" aria-current="page">Factures</li>
  </ol>
        </nav> 
        <div class="container">

        
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

    <div class="row">

        <table class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>CIN</th>
              <th>NOM et PRENOM </th>
              <th>DATE</th>
              <th>MONTANT</th>
            </tr>
          </thead>
          <tbody>


          <?php
           include 'database.php';
           $pdo = Database::connect();
           $sql = 'SELECT * FROM patients,factures where patients.cin=factures.cin ORDER BY id DESC; ';

           foreach ($pdo->query($sql) as $row) {
                    echo '<tr>';
                    echo '<td>'. $row['cin'] . '</td>';
                    echo '<td>'. $row['nom'] . ' ' . $row['prenom'] .'</td>';
                    echo '<td>'. $row['dateAuj'] . '</td>';
                    echo '<td>'. $row['montant'] . '</td>';
                   
                    echo ' ';
                    echo '</tr>';
           }
           Database::disconnect();
          ?>
          
          </tbody>
    </table>
</div>
</div> <!-- /container -->

<style>
             #blue{background-color: #0d6efd;}

         </style>






        </main>
