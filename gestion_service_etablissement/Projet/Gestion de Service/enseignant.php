<?php
     require("auth/EtreAuthentifie.php");
    require("db_config.php");
    $title = 'Gestion des Enseignants';
    include("header.php");
?>
        <p><a href="<?= $pathFor['logout'] ?>" title="Logout"> Deconnexion </a> <a href="home.php"><br/> Acceuil </a></p></br>
        <table class="center1"> 
            <tr>
                <th>   Gestion Des Enseignants </th>
            </tr>
            <tr>
                <td> <a href="liste_prof.php"> Liste des Enseignant  / update / delete </a></td>
            </tr>
            <tr>
                 <td><a href="ajout_prof.php"> Ajoute Un Enseignant </a></td>
            </tr>
            <tr>
                <td><a href="user_prof_update.php"> Modifier </a></td>
            </tr>
        </table>
  
    
<?php    
    include("footer.php");
?>