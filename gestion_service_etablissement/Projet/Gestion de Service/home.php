<?php
    require("auth/EtreAuthentifie.php");
    $title = 'Accueil';
    include("header.php");
?> 
    <a href="<?= $pathFor['logout'] ?>" title="Logout">Deconnexion</a></br>
    <?php
        echo $idm->getIdentity() ;   /* Your uid is: ". $idm->getUid();*/
        $login = $idm->getRole();
        if($login == 'admin') 
        {       echo '<p><a href="gestion_operation"> Gestion Des Operations CRUD </a></p>';
                echo '<table class="centrer">';               
                echo '<tr><td><a href="liste_mod_bord.php"> Liste des modules et groupes affecté pour chaque enseignant </a></td></tr>';
                echo '<tr><td><a href="liste_groupe_bord.php"> Liste des  enseignants affectés pour chaque groupes </a></td></tr>';
                echo '<tr><td><a href="liste_module_bord.php"> Liste des groupes pour chaque module </a></td></tr>';
                echo '<tr><td><a href="encours.php"> recherche un enseigant avec service non-complet </a></td></tr>';
             
          echo '</table>';
        }
   if($login == 'user')
   {           
                echo '<table class="center1">';   
                echo '<tr><td><a href="affection_ense.php">Affectation et Statistique </a></td></tr>';
                echo '<tr><td><a href="change_mot_pass_user.php"> Modifier mot de passe </a></td></tr>';    
                echo '</table>';
   }
       
   include("footer.php");
?>