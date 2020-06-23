<?php
    require("auth/EtreAuthentifie.php");
    require("db_config.php");
    $title = 'Liste des modules et groupe ';
    include("header.php");
?>
    <a href="<?= $pathFor['logout'] ?>" title="Logout">Deconnexion</a><a href="home.php"></br> Acceuil </a></br>
     <div class="center">
    <form method="POST" >
    <table>    
        <td><label for="inputa"> Quel année </label></td>    
        <td> <input type="text" name="a" id="inputa" value= 2019 ></td>
        <td><input type="submit" value="search" /></td>   
    </table>
    </form>
    </div>



    <?php
       if(isset($_POST['a'])) 
       {
           try
            {
	           $bdd = new PDO($dsn, $username, $password);
            }
               catch(Exception $e)
            {
               die('Erreur : '.$e->getMessage());
            }
            $year  = $_POST['a']; // SELECtion par rapport à l'année
           $sql = "SELECT enseignants.eid AS idA, enseignants.nom AS name,affectations.gid AS idP, etypes.nbh AS Hp, affectations.nbh AS Hf FROM (( enseignants INNER JOIN etypes ON enseignants.etid=etypes.etid )
                                       INNER JOIN affectations ON enseignants.eid=affectations.eid) 
                                       WHERE enseignants.annee ='$year'
                                       GROUP BY enseignants.eid";
            echo '<p class="center"> Les statistiques des heure des enseignants </p>';
             $rep = $bdd->prepare($sql);
            $rep->execute(array());
            echo '<table class="center1">';
            echo '<th> id enseignant </th>';
            echo '<th> Nom enseignant </th>';
            echo '<th> Id groupe affecté </th>';
            echo '<th> Capacite d heure d enseignant </th>';
            echo '<th> Le nombre d heure effectuées </th>';
            echo '<th> Le nombre d heure maquant </th>';
            while($donne1 = $rep->fetch())
            {
                echo '<tr>';
                echo '<td>'.$donne1['idA'].'</td><td>'.$donne1['name'].'</td><td>'.$donne1['idP'].'</td>';
                echo '<td>'.$donne1['Hp'].'</td><td>'.$donne1['Hf'].'</td>';
                $diff = ($donne1['Hp'] - $donne1['Hf']);
                echo '<td>'.$diff.'</td>';
                echo '</tr>';           
            }
           echo '</table>';
       }
    include("footer.php");   
    ?>
