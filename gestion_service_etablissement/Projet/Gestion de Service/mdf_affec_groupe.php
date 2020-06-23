<?php
   require("auth/EtreAuthentifie.php");
    require("db_config.php");
    $title = 'Liste des Groupes affecté à des modules';
    include("header.php");
?>
    <a href="<?= $pathFor['logout'] ?>" title="Logout">Deconnexion</a><a href="home.php"></br> Acceuil </a></br>
    <table class="centrer">
        <tr>
            <th> Id groupe </th>
            <th> Id module </th>
            <th> Nom Groupe </th>
            <th> Id type Groupe </th>
            <th> intitulé module </th>
            <th> Annee </th>
            <th> Modifier </th>
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
        $sql = "SELECT gid,groupes.mid AS id, nom, gtid, intitule, groupes.annee AS year FROM groupes INNER JOIN modules ON groupes.mid=modules.mid";
      $reponse = $bdd->prepare($sql);
        $reponse->execute(array());
        while($donne = $reponse->fetch())
        {
            echo '<tr>';
            echo '</td><td>'.$donne['gid'].'</td><td>'.$donne['id'].'</td>';
            echo '<td>'.$donne['nom'].'</td><td>'.$donne['gtid'].'</td>';
            echo '<td>'.$donne['intitule'].'</td><td>'.$donne['year'].'</td>';
            echo '<td>'.'<a href="mdf_groupe_aff_mod.php?a='.$donne['gid'].'&b='.$donne['id'].'&c='.$donne['nom'].'&d='.$donne['year'].'&e='.$donne['gtid'].'&f='.$donne['intitule'].'"> modifier </a></td>';
            echo '</tr>';        
        }
         echo '</table>';    
    include("footer.php");
    ?>
        