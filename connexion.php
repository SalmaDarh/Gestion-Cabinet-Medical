
<?php 
    include('header.php');
     // Démarrage de la session
     session_start(); 
    
    if(isset($_POST['email']) && isset($_POST['pass'])) // Si il existe les champs email, password et qu'il sont pas vident
    {
        
        $email = $_POST['email']; 
        $password = $_POST['pass'];  
        if($email=="secretaire@mdo.ma" && $password=="1234")
	    {    
            
		$_SESSION['secretaire']="secretaire";
        
		header('Location:accueilSec.php');
		
			
	    }
	    else if($email=="docteur@mdo.ma" && $password=="1234")
	    {  
            $_SESSION['medecin']="medecin";
        header('Location:accueilMed.php');
	    }
	    else
	    {
	    $err ="informations incorrectes";
        
        header('Location:index.php');
       
	    }  
    }
    ?>
 