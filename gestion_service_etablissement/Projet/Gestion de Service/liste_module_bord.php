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
        <td> <input type="text" name="a" id="inputa" value=2019 ></td>
        <td><input type="submit" value="search" /></td>   
    </table>
    </form>
    </div>
    <table class="center1">
         <tr>
            <th>  Id enseignant </th>
            <th>  Id module </th>
            <th>  Id groupe </th>
            <th>   Nom Groupe </th>
            <th>   nombre heure nécessaire </th>
            <th>   nombre heure effectués   </th>
            <th>    nombre manquats     </th>
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
            $trace = 0;
            $year  = $_POST['a']; // SELECtion par rapport à l'année
            $sql1 = "SELECT affectations.eid AS ID1, affectations.gid AS ID2,groupes.mid AS ID3, groupes.nom AS name, SUM(gtypes.nbh) AS hg, SUM(affectations.nbh) AS nbh FROM ((`groupes` INNER JOIN  `affectations` ON groupes.gid=affectations.gid) 
            INNER JOIN `gtypes` ON gtypes.gtid=groupes.gtid)
            WHERE groupes.annee = '$year' 
            GROUP BY groupes.mid";
              echo '<p class="center"> La liste des groupe affectés pour chaque modules </p>';
            
            $reponse = $bdd->prepare($sql1);
            $reponse->execute(array());
            while($donne = $reponse->fetch())
            {   $trace = 1;
                echo '<tr>';
                echo '<td>'.$donne['ID1'].'</td><td>'.$donne['ID2'].'</td><td>'.$donne['ID3'].'</td>';
                echo '<td>'.$donne['name'].'</td><td>'.$donne['hg'].'</td>';
                echo '<td>'.$donne['nbh'].'</td>';
                $maq = $donne['hg'] - $donne['nbh'];
                echo '<td>'.$maq.'</td>';
                echo '</tr>';           
            }
            echo '</table>';
             if ($trace == 0) {
              echo '<p class="center"> Aucune information correspond à cette date !  </p>';
             }
            
            
       }
    include("footer.php");   
    ?>
