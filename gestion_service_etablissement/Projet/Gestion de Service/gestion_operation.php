<?php
     require("auth/EtreAuthentifie.php");
    require("db_config.php");
    $title = 'Gestion des Affectation';
    include("header.php");
?>
        <p><a href="<?= $pathFor['logout'] ?>" title="Logout"> Deconnexion </a> <a href="home.php"><br/> Acceuil </a></p></br>
        
       <table class="centrer">               
                 <tr><td><a href="user.php">Gestion compter utilisateur </a></td></tr>
                 <tr><td><a href="enseignant.php"> Gestion Des Enseignants </a></td></tr>
                <tr><td><a href="module.php"> Gestion Des Modules </a></td></tr>
                <tr><td><a href="groupe.php"> Gestion Des Groupes </a></td></tr>
                <tr><td><a href="gtypes.php"> Gestion Types des Groupes </a></td></tr>
                <tr><td><a href="affectation.php"> Gestion Des Affectations Des Groupes a des Enseignants </a></td></tr>
        </table>;
  
    
<?php    
    include("footer.php");
?>