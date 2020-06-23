<?php
    require("auth/EtreAuthentifie.php");
    require("db_config.php");
    $title = 'Suprimer un enseignant';
    include("header.php");
?>
    <a href="<?= $pathFor['logout'] ?>" title="Logout">Deconnexion</a><a href="home.php"></br> Acceuil </a></br>
    <p class="center"> <a href="affectation.php"> Page Précedente </a></p>
    <table class="center1">
        <tr>
            <th> Id Ensignant </th>
            <th> Id groupe </th>
            <th> Nombre d'heure </th>
            <th> modifier </th>
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
            $sql = "SELECT * FROM affectations ";
            $reponse = $bdd->prepare($sql);
            $reponse->execute(array());
            while($donne = $reponse->fetch())
            {
                echo '<tr>';
                echo '<td>'.$donne['eid'].'</td><td>'.$donne['gid'].'</td>';
                echo '<td>'.$donne['nbh'].'</td>';
                echo '<td> <a href="mdf_affectation.php?a='.$donne['eid'].'&b='.$donne['gid'].'&c='.$donne['nbh'].'"> modifier le nombre d heure </a></td>';
                echo '<td> <a href="sup_affectation.php?a='.$donne['eid'].'&b='.$donne['gid'].'"> Supprimer </a></td>';
                echo '</tr>';           
            }
            echo '</table>';
    include("footer.php");   
    ?>
