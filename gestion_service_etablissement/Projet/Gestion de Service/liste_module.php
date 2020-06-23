<?php
   require("auth/EtreAuthentifie.php");
    require("db_config.php");
    $title = 'Liste des Modules';
    include("header.php");
?>
    <a href="<?= $pathFor['logout'] ?>" title="Logout">Deconnexion</a><a href="home.php"></br> Acceuil </a></br>
    <table class="centrer">
        <tr>
            <th> Id module </th>
            <th> intitule </th>
            <th> code </th>
            <th> Id enseignant Responsable </th>
            <th> Année </th>
            <th> Catégorie </th>
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
        $sql = "SELECT mid,intitule,code,modules.eid AS id1 ,modules.cid AS id2,modules.annee As year FROM (( modules INNER JOIN enseignants ON modules.eid=enseignants.eid) INNER JOIN categories ON modules.cid=categories.cid)";
        $reponse = $bdd->prepare($sql);
        $reponse->execute(array());
        while($donne = $reponse->fetch())
        {
            echo '<tr>';
            echo '</td><td>'.$donne['mid'].'</td><td>'.$donne['intitule'].'</td>';
            echo '<td>'.$donne['code'].'</td><td>'.$donne['id1'].'</td>';
            echo '<td>'.$donne['id2'].'</td><td>'.$donne['year'].'</td>';
            echo '<td><a href="mdf_module.php?inti='.$donne['intitule'].'&cod='.$donne['code'].'&id='.$donne['id1'].'&cid='.$donne['id2'].'&year='.$donne['year'].'&mid='.$donne['mid'].'">modifier</a></td>';
            echo '<td><a href="sup_module.php?&idA='.$donne['mid'].'"> Supprimer</a> </td>';
            echo '</tr>';        
        }
         echo '</table>';    
    include("footer.php");
    ?>
        
    
