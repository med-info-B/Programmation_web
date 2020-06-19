<!doctype html>
<html lang="en">
  <head>
    <!-- Header File-->
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="../Ressource/Style/HomeStyle.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title><?= $title??"" ?></title>
   
  </head>
  <body>
    <div class="container-fluid">
      <div class="pos-f-t">
        <div class="collapse" id="navbarToggleExternalContent">
          <div class="bg-dark p-4">
            <h5 class="text-white h4"> Plateforme </h5>
            <span class="text-muted"> Freelancers vs Recuteurs </span>
          </div>
        </div>
        <nav class="navbar navbar-dark bg-dark">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
          </button>
          <div class = "container-fluid" >
          <li class="nav-item dropdown" id ="test">
              <a class="nav-link dropdown-toggle"   data-toggle="dropdown" href="#" > S'inscrire </a>
                <div class="dropdown-menu">
                <a class="dropdown-item" href="ControllerInscription.php">Je suis Freelancer </a>
                <a class="dropdown-item" href="ControllerInscriptionR.php">Je suis Recruteur  </a>
            </li> 
            
          <a class="btn btn-primary" id="btnc" href="switcher.php" role="button"> se Connecter </a>
          </div> 
         
         
         

          </div>
        </nav>
      </div>
    </div>
    <!-- Mise en page pour freelancer -->
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-4">
          <p class="a">
            <button class="btn btn-primary" id="bte_free" type="button" data-toggle="collapse" data-target="#listActionF" aria-expanded="false" aria-controls="collapseExample"> Freelancers
            </button>
          </p>
          <div class="collapse" id="listActionF">
            <div class="card card-body">
              <div class="list-group">
                <a href="ControllerInscription.php" class="list-group-item list-group-item-action"> Créer Mon CV </a>
                <a href="#" class="list-group-item list-group-item-action"> Trouver une Mission </a>
              </div>
            </div>
          </div>
        </div>
    <!-- Mise en page pour Recreteurs -->
        <div class="col-lg-4">
          <p class="a">
            <button class="btn btn-primary" id="bte_free" type="button" data-toggle="collapse" data-target="#listActionR" aria-expanded="false" aria-controls="collapseExample"> Recruteurs
            </button>
           </p>
           <div class="collapse" id="listActionR">
            <div class="card card-body">
             <div class="list-group">
              <a href="ControllerInscriptionR.php" class="list-group-item list-group-item-action"> Diffuser une offre de mission</a>
              <a href="#" class="list-group-item list-group-item-action"> Trouver un expert </a>
              </div>
            </div>
           </div>
        </div>
      </div>
    </div>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
