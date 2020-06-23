<?php
     require("auth/EtreAuthentifie.php");
    require("db_config.php");
    $title = 'Gestion des Affectation';
    include("header.php");
?>
        <p><a href="<?= $pathFor['logout'] ?>" title="Logout"> Deconnexion </a> <a href="home.php"><br/> Acceuil </a></p></br>
        <table class="centrer"> 
            <tr>
                <th>   Gestion Des Groupes </th>
            </tr>
            <tr>
                <td> <a href="Liste_affectation.php"> Liste des affetations / modifier / Supprimer  </a></td>
            </tr>
            <tr>
                 <td><a href="ajout_affect.php">  Ajouter une affetation   </a></td>
            </tr>
         
        </table>
  
    
<?php    
    include("footer.php");
?>