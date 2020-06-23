<?php
    require("auth/EtreAuthentifie.php");
    $title = 'Gestion des utilisateur';
    include("header.php");
?>
    <p><a href="<?= $pathFor['logout'] ?>" title="Logout"> Deconnexion </a> <a href="home.php"><br/> Acceuil </a></p></br>
    <table class="center1"> 
        <tr>
            <th>   Gestion Des Utilisateurs </th>
        </tr>
        <tr>
            <td> <a href="liste_user.php"> Liste des Utilisateurs / update user / delete user </a></td>
        </tr>
        <tr>
            <td><a href="ajout_user.php?a=2"> Ajoute Un utilisateur</a></td>
        </tr>
        <tr>
            <td><a href="user_prof_update.php"> Modifier un compte utilisateur associer à un enseignant </a></td>
        </tr>
    </table> 
<?php    
    include("footer.php");
?>