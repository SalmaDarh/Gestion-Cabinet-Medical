<?php include('header.php');?>
<nav class="navbar navbar-light bg-light p-2">
  <div class="d-flex col-12 col-md-3 col-lg-2 mb-2 mb-lg-0 flex-wrap flex-md-nowrap justify-content-between">
      <a class="navbar-brand" href="#">
         
     <img src="images/logo.png" alt="logo" width="100" length="100" />
      </a>
      <button class="navbar-toggler d-md-none collapsed mb-3" type="button" data-toggle="collapse" data-target="#sidebar" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>
  </div>
 
  <div class="col-12 col-md-5 col-lg-8 d-flex align-items-center justify-content-md-end mt-3 mt-md-0">
     
      <div class="dropdown">
          <button class="btn btn-secondary dropbtn" >
            Parametres
          </button>
          <ul class="dropdown-menu dropdown-content" aria-labelledby="dropdownMenuButton">
            <li><a class="dropdown-item" href="#">Compte</a></li>
            <li><a class="dropdown-item" href="deconnexion.php">Deconnexion</a></li>
          </ul>
        </div>

  </div>
</div>
      
  </div>
</nav>

<style>
.dropbtn {
  background-color: #0d6efd;
  color: white;
  padding: 14px;
  font-size: 14px;
  border: none;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 100px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #0d6efd;}
</style>