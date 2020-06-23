<?php
    require("auth/EtreAuthentifie.php");
    require("db_config.php");
    $title = 'Liste des modules et groupe ';
    include("header.php");
?>
    <a href="<?= $pathFor['logout'] ?>" title="Logout">Deconnexion</a><a href="home.php"></br> Acceuil </a></br>
 
    <form method="POST" >
    <table>    
        <td><label for="inputa"> Quel année </label></td>    
        <td> <input type="text" name="a" id="inputa" value=2019 ></td>
        <td><input type="submit" value="search" /></td>   
        </table>
    </form>



   <table class="center1">
        <tr>
            <th> Id Ensignant </th>
            <th> Id groupe </th>
            <th> Id module </th>
            <th> Intitule </th>
            <th> Nom de Groupe </th>
            <th> nbh </th>
            <th> eqtd </th>
        </tr>
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
            $year  = $_POST['a'];
            $sql1 = "SELECT affectations.eid AS ID1, groupes.gid AS ID2,groupes.mid AS ID3, intitule, groupes.nom AS NOMG, SUM(affectations.nbh) AS nbh, (AVG(affectations.nbh)* gtypes.coeff) AS eqtd FROM (((`groupes` INNER JOIN  `affectations` ON groupes.gid=affectations.gid) 
             INNER JOIN `gtypes` ON gtypes.gtid=groupes.gtid) 
             INNER JOIN `modules`ON groupes.mid=modules.mid)
               WHERE groupes.annee = '$year' 
               GROUP BY groupes.mid";
            echo '<p class="center"> La liste des modules et des groupes affectés </p>';
            $reponse = $bdd->prepare($sql1);
            $reponse->execute(array());
            while($donne = $reponse->fetch())
            {
                echo '<tr>';
                echo '<td>'.$donne['ID1'].'</td><td>'.$donne['ID2'].'</td><td>'.$donne['ID3'].'</td>';
                echo '<td>'.$donne['intitule'].'</td><td>'.$donne['NOMG'].'</td>';
                echo '<td>'.$donne['nbh'].'</td><td>'.$donne['eqtd'].'</td>';
                echo '</tr>';           
            }
            echo '</table>';
            $sql = "SELECT enseignants.eid AS idA, enseignants.nom AS name, etypes.nbh AS Hp, affectations.nbh AS Hf FROM (( enseignants INNER JOIN etypes ON enseignants.etid=etypes.etid )
                                       INNER JOIN affectations ON enseignants.eid=affectations.eid) 
                                        GROUP BY enseignants.eid";
            echo '<p class="center"> Les statistiques des heure des enseignants </p>';
             $rep = $bdd->prepare($sql);
            $rep->execute(array());
            echo '<table class="center1">';
            echo '<th> id enseignant </th>';
            echo '<th> Nom enseignant </th>';
            echo '<th> Capacite d heure d enseignant </th>';
            echo '<th> Le nombre d heure effectuées </th>';
            echo '<th> Le nombre d heure maquant </th>';
            while($donne1 = $rep->fetch())
            {
                echo '<tr>';
                echo '<td>'.$donne1['idA'].'</td><td>'.$donne1['name'].'</td>';
                echo '<td>'.$donne1['Hp'].'</td><td>'.$donne1['Hf'].'</td>';
                $diff = ($donne1['Hp'] - $donne1['Hf']);
                echo '<td>'.$diff.'</td>';
                echo '</tr>';           
            }
           echo '<table>';
       }
    include("footer.php");   
    ?>
