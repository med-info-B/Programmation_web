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
       
            <p class="class" >  <a href="Liste_affectation.php"> Liste des affectations </a></p>
    
        <form method="POST">        
            <table>
                    <tr>
                        <td><label for="inputc" class="control-label"> Nombre d'heure </label></td>
                        <td><input type="number" name="C" class="form-control" id="inputc" value=<?php echo $_GET['c'];?> /></td>
                    </tr>
           </table>
           <div class="form-group">
                    <button type="submit" class="btn btn-primary"> Modifier </button>
           </div>
        </form>
        </div>
        <?php 
            $error = "";
            if(isset($_POST['C'])) 
             {
                try
                {         
	               $bdd = new PDO($dsn, $username, $password);
                }
                   catch(Exception $e)
                {
                   die('Erreur : '.$e->getMessage());
                }
                $heureM = $_POST['C'];
                $heurepr =0;
                
                $idA = $_GET['a'];  // Enseignant
                $idB = $_GET['b'];  // groupe
                 // heure à effectuer de l'enseignant
                $sql1 ="SELECT nbh  FROM `etypes`
                WHERE etid IN ( SELECT etid FROM `enseignants` WHERE eid='$idA')";    
                $stmt2 = $db->prepare($sql1);
                $res2 = $stmt2->execute();
                $data = $stmt2->fetch();
                $heurepr = $data['nbh'];
                //insersion à condition que les heures du groupe ou module soit infe à celui du prof
                if($heurepr >= $heureM) 
                {     
                    $sql3 = "UPDATE affectations SET nbh =?
                    WHERE eid='$idA' AND gid ='$idB'";     
                    $reponse2 = $bdd->prepare($sql3);
                    $reponse2->execute(array($heureM)); 
                     header('Location: liste_affectation.php');
                }
                else
                {
                    echo '<p class="center">Ce nombre depasse la capacite d heures de l enseignant</p>';
                }
      
                
          
             }
             
    include("footer.php");
   ?>
        