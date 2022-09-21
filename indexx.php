<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/037ceaa57e.js" crossorigin="anonymous"></script>
  </head>
 
<body>
    <div class="container">

    <!--<div class="row">
                <h1>Liste des patients</h1>
            </div>-->

            <div class="row">
                <p> 

                      <a href="createpatient.php"  class="btn btn-primary" title="Nouveau patient"><i class="fas fa-plus"></i> Nouveau patient</a>
                </p>

                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>CIN</th>
                      <th>NOM</th>
                      <th>PRENOM</th>
                    </tr>
                  </thead>
                  <tbody>


                  <?php
                   include 'database.php';
                   $pdo = Database::connect();
                   $sql = 'SELECT * FROM patients ORDER BY id DESC';
                   foreach ($pdo->query($sql) as $row) {
                            echo '<tr>';
                            echo '<td>'. $row['cin'] . '</td>';
                            echo '<td>'. $row['nom'] . '</td>';
                            echo '<td>'. $row['prenom'] . '</td>';
                            echo '<td width=250>';
                            echo '<a class="btn" title="Voir la fiche patient" href="readPatient.php?id='.$row['id'].'" ><i class="fas fa-file-medical fa-2x"></i></i></a>';
                            echo ' ';
                            echo '<a class="btn btn-success" title="Modifier la fiche patient" href="updatePatient.php?id='.$row['id'].'"><i class="fas fa-user-edit"></i></a>';
                            echo ' ';
                            echo '<a class="btn btn-danger" title="Supprimer le patient" href="deletePatient.php?id='.$row['id'].'"><i class="fas fa-trash"></i></a>';
                            echo '</td>';
                            echo '</tr>';
                   }
                   Database::disconnect();
                  ?>
                  
                  </tbody>
            </table>
        </div>
    </div> <!-- /container -->
  </body>
<style>
                     #blue{background-color: #0d6efd;}
                 </style>
</html>