<?php
    require("auth/EtreAuthentifie.php");
    require("db_config.php");
    $title = 'Ajouter affectation';
    include("header.php");
?>
        <a href="<?= $pathFor['logout'] ?>" title="Logout"> Deconnexion </a></br>
        <a href="home.php"> Acceuil </a>
        <div class="center">
        <h1> Affecter un groupe à un enseignant  </h1>
       
            <p class="center"> <a href="liste_prof.php"> liste des enseignants </a></p>
            <p class="center"> <a href="liste_groupe.php"> liste des groupes </a> </p>
            <p class="class" >  <a href="Liste_affectation.php"> Liste des affectations </a></p>
    
        <form method="POST">        
            <table>
                    <tr>
                         <td><label for="inputa" class="control-label"> Id enseignant </label></td>
                         <td><input type="text" name="A" class="form-control" id="inputa" placeholder="Id eneignant" required/>
                         </td>
                    </tr>        
                    <tr>
                        <td><label for="inputb" class="control-label"> Id Goupe </label></td>
                        <td><input type="text" name="B" class="form-control" id="inputb" placeholder="Id groupe" required /></td>
                    </tr>
                    <tr>
                        <td><label for="inputc" class="control-label"> Nombre d'heure </label></td>
                        <td><input type="number" name="C" class="form-control" id="inputc" placeholder="exp : 15 heure" /></td>
                    </tr>
           </table>
           <div class="form-group">
                    <button type="submit" class="btn btn-primary"> Ajouter </button>
           </div>
        </form>
        </div>
        <?php 
            $error = "";
            if(isset($_POST['A']) && isset($_POST['B'])) 
             {
                try
                {         
	               $bdd = new PDO($dsn, $username, $password);
                }
                   catch(Exception $e)
                {
                   die('Erreur : '.$e->getMessage());
                }
                 // attribuer par default les nombres totales des heures à l'enseignant au cas où il est pas saisi le nombre d'heure 
                $idA = $_POST['A'];  // enseignant
                $idB = $_POST['B'];  // Groupe
                $heureM = $_POST['C'];
                $heurepr =0;
                // heure total du module 
                if(empty($_POST['C']))
                {      
                        $heureM = 0;
                        $SQL = "SELECT mid FROM groupes WHERE gid='$idB'";
                        $stmt = $db->prepare($SQL);
                        $res = $stmt->execute();
                        $donne1 = $stmt->fetch();
                        $midM = $donne1['mid'];
                        $sql = "SELECT * FROM gtypes WHERE gtid IN ( SELECT gtid FROM `groupes` WHERE mid='$midM')";
                        $stmt1 = $db->prepare($sql);
                        $res1 = $stmt1->execute();
                        while($data = $stmt1->fetch())
                        {
                        $heureM = $heureM  + $data['nbh']; 
                        }
                      
                }
                        // heure à effectuer de l'enseignant
                        $sql1 ="SELECT nbh  FROM `etypes`
                        WHERE etid IN ( SELECT etid FROM `enseignants` WHERE eid='$idA')";    
                        $stmt2 = $db->prepare($sql1);
                        $res2 = $stmt2->execute();
                        $data = $stmt2->fetch();
                        $heurepr = $data['nbh'];
                        //insersion à condition que les heures du groupe ou module soit infe à celui du prof
                        if($heurepr >= $heureM) 
                        {       echo 'salam';
                                $sql3 = "INSERT INTO affectations(eid,gid,nbh)
                                VALUE(:eid, :gid, :nbh)";
                                $reponse2 = $bdd->prepare($sql3);
                                $reponse2->execute(array(
                                'eid' => $idA,
                                'gid' => $idB,
                                'nbh' => $heureM
                                ));  
                        }
                        
            
                
          
             }
             
    include("footer.php");
   ?>
        