<?php
    require("auth/EtreAuthentifie.php");
    require("db_config.php");
    $title = 'Liste des utilisateurs';
    include("header.php");
?>

         <a href="<?= $pathFor['logout'] ?>" title="Logout">Deconnexion</a></br>
         <a href="home.php"> Acceuil </a>
         <p class="center"> Liste des Enseignants qui ont un compte utilisateur </p>
        <table class="center1">
            <tr>
                <th> Id user </th>
                <th> login </th>
                <th> Non  </th>
                <th> Prenom </th>
                <th> Role </th>
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
            $sql = "SELECT * FROM users INNER JOIN enseignants ON users.uid = enseignants.uid";
            $reponse = $bdd->prepare($sql);
            $reponse->execute(array());
            while($donne = $reponse->fetch())
            {
                echo '<tr>';
                echo '<td>'.$donne['uid'].'</td><td>'.$donne['login'].'</td><td>'.$donne['nom'].'</td>';
                echo '<td>'.$donne['prenom'].'</td><td>'.$donne['role'].'</td>';
                echo '<td> <a href="mdf_user_prof.php?uid='.$donne['uid'].'&login='.$donne['login'].'&role='.$donne['role'].'"> Update </a></td>';
                echo '</tr>';
                    
            }
        echo '</table>';
    include("footer.php");          
?>
        
 