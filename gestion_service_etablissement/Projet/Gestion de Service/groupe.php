<?php
     require("auth/EtreAuthentifie.php");
    require("db_config.php");
    $title = 'Gestion des Groupe';
    include("header.php");
?>
        <p><a href="<?= $pathFor['logout'] ?>" title="Logout"> Deconnexion </a> <a href="home.php"><br/> Acceuil </a></p></br>
        <table class="centrer"> 
            <tr>
                <th>   Gestion Des Groupes </th>
            </tr>
            <tr>
                <td> <a href="liste_groupe.php"> Liste des groupes  / update / delete </a></td>
            </tr>
            <tr>
                 <td><a href="ajout_groupe.php"> Ajoute Un groupe </a></td>
            </tr>
            <tr>
                <td><a href="mdf_affec_groupe.php"> Modifier de l'affectation à un groupe </a></td>
            </tr>
        </table>
  
    
<?php    
    include("footer.php");
?>