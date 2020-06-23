<?php
   require("auth/EtreAuthentifie.php");
    require("db_config.php");
    $title = 'Liste des enseignants';
    include("header.php");
?>
    <a href="<?= $pathFor['logout'] ?>" title="Logout">Deconnexion</a><a href="home.php"></br> Acceuil </a></br>
    <table class="center1">
        <tr>
            <th> Id Enseignant </th>
            <th> Id user </th>
            <th> Nom </th>
            <th> Prenom </th>
            <th> E-mail </th>
            <th> N° : Tel </th>
            <th> Id etypes </th>
            <th> annee </th>
            <th> Type De contrat</th>
            <th> Nombre d heure</th>
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
        $sql = "SELECT eid,uid,enseignants.nom AS nomA,prenom,email,tel,enseignants.etid AS d ,annee, etypes.nom AS nomB, nbh FROM enseignants INNER JOIN etypes WHERE enseignants.etid=etypes.etid";
        $reponse = $bdd->prepare($sql);
        $reponse->execute(array());
        while($donne = $reponse->fetch())
        {
            echo '<tr>';
            echo '</td><td>'.$donne['eid'].'</td><td>'.$donne['uid'].'</td>';
            echo '<td>'.$donne['nomA'].'</td><td>'.$donne['prenom'].'</td>';
             echo '<td>'.$donne['email'].'</td><td>'.$donne['tel'].'</td>';
             echo '<td>'.$donne['d'].'</td><td>'.$donne['annee'].'</td><td>'.$donne['nomB'].'</td><td>'.$donne['nbh'].'</td>';
            echo '<td> <a href="mdf_prof.php?eid='.$donne['eid'].'&nom='.$donne['nomA'].'&prenom='.$donne['prenom'].'&email='.$donne['email'].'&tel='.$donne['tel'].'&annee='.$donne['annee'].'&etid='.$donne['d'].'"> Update </a></td>';
            echo '<td> <a href="sup_prof.php?eid='.$donne['eid'].'&etid='.$donne['d'].'"> Delete </a></td>';
            echo '</tr>';        
        }
         echo '</table>';    
    include("footer.php");
    ?>
        
    
