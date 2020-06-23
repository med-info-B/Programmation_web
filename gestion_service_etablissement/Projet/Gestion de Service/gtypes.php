<?php
     require("auth/EtreAuthentifie.php");
    require("db_config.php");
    $title = 'Gestion des Type de Groupe';
    include("header.php");
?>
        <p><a href="<?= $pathFor['logout'] ?>" title="Logout"> Deconnexion </a> <a href="home.php"><br/> Acceuil </a></p></br>
        <table class="centrer"> 
            <tr>
                <th>   Gestion Des Type De Groupe </th>
            </tr>
            <tr>
                <td> <a href="liste_typegroupe.php"> Liste des groupes  / update / delete </a></td>
            </tr>
            <tr>
                 <td><a href="ajout_typegroupe.php"> Ajoute Un groupe </a></td>
            </tr>
        </table>
  
    
<?php    
    include("footer.php");
?>