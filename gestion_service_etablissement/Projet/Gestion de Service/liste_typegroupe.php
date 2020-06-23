<?php
   require("auth/EtreAuthentifie.php");
    require("db_config.php");
    $title = 'Liste des Types des Groupes';
    include("header.php");
?>
    <a href="<?= $pathFor['logout'] ?>" title="Logout">Deconnexion</a><a href="home.php"></br> Acceuil </a></br>
    <table class="centrer">
        <tr>
            <th> Id Type de groupe </th>
            <th> Nom  </th>
            <th> Nombre d'heure </th>
            <th> coefficient </th>
            <th> Modifier </th> 
            <th> Supprimer </th>
        </tr>
    <?php
        try
        {       
	     $bdd = new PDO($dsn, $username, $password);
        }
        catch(Exception $e)
        {
         die('Erreur : '.$e->getMessage());
        }
        $sql = "SELECT * FROM gtypes";
        $reponse = $bdd->prepare($sql);
        $reponse->execute(array());
        while($donne = $reponse->fetch())
        {
            echo '<tr>';
            echo '</td><td>'.$donne['gtid'].'</td><td>'.$donne['nom'].'</td>';
            echo '<td>'.$donne['nbh'].'</td><td>'.$donne['coeff'].'</td>';
            echo '<td><a href="mdf_type_groupe.php?a='.$donne['gtid'].'&b='.$donne['nom'].'&c='.$donne['nbh'].'&d='.$donne['coeff'].'"> modifier </a></td>';
            echo '<td><a href="sup_inuti_typegroupe.php?&a='.$donne['gtid'].'"> Supprimer</a> </td>';
            echo '</tr>';        
        }
         echo '</table>';    
    include("footer.php");
    ?>
        