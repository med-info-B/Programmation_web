<?php
    require("auth/EtreAuthentifie.php");
    require("db_config.php");
    $title = 'Suprimer un enseignant';
    include("header.php");
?>
    <a href="<?= $pathFor['logout'] ?>" title="Logout">Deconnexion</a><a href="home.php"></br> Acceuil </a></br>
    <table class="center1">
        <tr>
            <th> Id user </th>
            <th> login </th>
            <th> Role </th>
            <th> change mdp </th>
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
            $sql = "SELECT * FROM users ";
            $reponse = $bdd->prepare($sql);
            $reponse->execute(array());
            while($donne = $reponse->fetch())
            {
                echo '<tr>';
                echo '<td>'.$donne['uid'].'</td><td>'.$donne['login'].'</td>';
                echo '<td>'.$donne['role'].'</td>';
                echo '<td> <a href="mdf_mdp.php?uid='.$donne['uid'].'&login='.$donne['login'].'"> Update </a></td>';
                echo '<td> <a href="sup_user.php?uid='.$donne['uid'].'"> Delete </a></td>';
                echo '</tr>';           
            }
            echo '</table>';
    include("footer.php");   
    ?>
