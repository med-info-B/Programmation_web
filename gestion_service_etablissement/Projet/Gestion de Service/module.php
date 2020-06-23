<?php
     require("auth/EtreAuthentifie.php");
    require("db_config.php");
    $title = 'Gestion des Modules';
    include("header.php");
?>
        <p><a href="<?= $pathFor['logout'] ?>" title="Logout"> Deconnexion </a> <a href="home.php"><br/> Acceuil </a></p></br>
        <table class="centrer"> 
            <tr>
                <th>   Gestion Des Modules </th>
            </tr>
            <tr>
                <td> <a href="liste_module.php"> Liste des modules  / update / delete </a></td>
            </tr>
            <tr>
                 <td><a href="ajout_module.php"> Ajoute Un module </a></td>
            </tr>
            <tr>
                <td><a href="liste_module.php"> Modifier un module </a></td>
            </tr>
        </table>
  
    
<?php    
    include("footer.php");
?>