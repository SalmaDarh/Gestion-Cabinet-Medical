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

<h1 style=" display:inline;">Bilan des recettes</h1>
<br/><br/>
<style> .btnretour:hover {background-color: gray;} 
.btnretour{ background-color : #0d6efd;
  color: white; border : solid 2px; border-color: gray;
  length:50px; width:120px;
  }
  .bottom{margin-bottom : 25px;}
</style>

</form>
<form method="post" class="form-horizontal" action="bilan.php">
<div class="form-row">
  <div class="form-group col-md-2">
    <label for="debut" >Debut :</label>
    <input type="date" class="form-control "    name="dateDebut" id="debut">
</div>
    <div class="form-group col-md-2">
    <label for="fin" >Fin :</label>
    <input type="date" class="form-control "   name="dateFin" id="fin">
</div>
<div class="form-group col-md-2 ">
<button type="submit" name="submit1" style="margin-top:23px" class="btn btnretour"> voir bilan</button>
</div>
</div>
    
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
