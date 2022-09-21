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
<h1 style=" display:inline;">Bilan</h1>     
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

       


          <?php
          if (isset($_POST['submit1'])){
              $dateD=$_POST['dateDebut'];
              $dateF=$_POST['dateFin'];
           include 'database.php';
           $pdo = Database::connect();
           $sql = "SELECT SUM(montant) AS indic FROM factures WHERE (dateAuj BETWEEN '$dateD' AND '$dateF'); ";
            echo( " <table class='table table-striped table-bordered'>
            <thead>
              <tr>
                <th> Montant total du " . $dateD . " au " . $dateF . "</th>
              </tr>
              
              
            </thead>
            <tbody>");
           foreach ($pdo->query($sql) as $row) {
                    echo '<tr>';
                    echo '<td>'. $row['indic'] . ' DH</td>';
                    ;
                   
                    echo ' ';
                    echo '</tr>';
           }
           Database::disconnect(); 
        
    }
          ?>

          
          </tbody>
    </table>
</div>
</div> <!-- /container -->

<style>
             #blue{background-color: #0d6efd;}

         </style>






        </main>
