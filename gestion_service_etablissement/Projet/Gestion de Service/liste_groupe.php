<?php
   require("auth/EtreAuthentifie.php");
    require("db_config.php");
    $title = 'Liste des Groupes';
    include("header.php");
?>
    <a href="<?= $pathFor['logout'] ?>" title="Logout">Deconnexion</a><a href="home.php"></br> Acceuil </a></br>
    <table class="centrer">
        <tr>
            <th> Id groupe </th>
            <th> Id enseignant </th>
            <th> Nom Groupe </th>
            <th> Annee </th>
            <th> Id Type de Groupe </th>
            <th> Update </th>
            <th> Delete </th>
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
        $sql = "SELECT * FROM groupes";
        $reponse = $bdd->prepare($sql);
        $reponse->execute(array());
        while($donne = $reponse->fetch())
        {
            echo '<tr>';
            echo '</td><td>'.$donne['gid'].'</td><td>'.$donne['mid'].'</td>';
            echo '<td>'.$donne['nom'].'</td><td>'.$donne['annee'].'</td>';
            echo '<td>'.$donne['gtid'].'</td>';
            echo '<td>'.'<a href="mdf_groupe.php?gd='.$donne['gtid'].'&d='.$donne['gid'].'&n='.$donne['nom'].'&year='.$donne['annee'].'&md='.$donne['mid'].'"> modifier </a></td>';
            echo '<td><a href="sup_groupe.php?&idA='.$donne['gid'].'"> Supprimer</a> </td>';
            echo '</tr>';        
        }
         echo '</table>';    
    include("footer.php");
    ?>
        