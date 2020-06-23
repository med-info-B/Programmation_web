  <?php
    require("auth/EtreAuthentifie.php");
    require("db_config.php");
    $title = 'Modifier un module';
    include("header.php");
?>
    <a href="<?= $pathFor['logout'] ?>" title="Logout"> Deconnexion </a></br>
    <a href="home.php"> Acceuil </a>
    <div class="center">
    <h1> Ajouter un module </h1>
    <form method="POST">            
        <table>
            <tr>
                <td><label for="inputint" class="control-label"> Intitulé </label></td>
                <td><input type="text" name="intit" class="form-control" id="inputint" value=<?php echo $_GET['inti'];?>></td>
            </tr>
            <tr>
                <td><label for="inputc" class="control-label"> Code </label></td>
                <td><input type="text" name="code" class="form-control" id="inputpre" value=<?php echo $_GET['cod'];?>></td>
            </tr>
            <tr>
                <td><label for="inputid" class="control-label"> Id Enseignant Responsable </label></td>
                <td><input type="text" name="id" class="form-control" id="inputid" value=<?php echo $_GET['id'];?>></td>
            </tr>
            <tr>
                <td><label for="inputca" class="control-label"> Id catégorie </label></td>
                <td><input type="text" name="cid" class="form-control" id="inputca" value=<?php echo $_GET['cid'];?> ></td>
            </tr>
            <tr>
                <td><label for="inputy" class="control-label">Année</label></td>
                <td><input type="text" name="year" class="form-control" id="inputtel" value=<?php echo  $_GET['year'];?> ></td>
            </tr>
        </table>
            <div class="form-group">
                <button type="submit" class="btn btn-primary"> Modifier </button>
            </div>
    </form>
    </div>
        <table class="center1">
        <tr>
            <th> Id Enseignant </th>
            <th> Nom </th>
            <th> Prenom </th>
            <th> Annee </th>
            <th> Type De contrat </th>
            <th> Nombre d heure</th>    
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
            $sql = "SELECT eid,enseignants.nom AS nomA,prenom,annee, etypes.nom AS nomB, nbh FROM enseignants INNER JOIN etypes WHERE enseignants.etid=etypes.etid";
            $reponse = $bdd->prepare($sql);
            $reponse->execute(array());
            while($donne = $reponse->fetch())
            {
             echo '<tr>';
             echo '</td><td>'.$donne['eid'].'</td><td>'.$donne['nomA'].'</td>';
             echo '<td>'.$donne['prenom'].'</td><td>'.$donne['annee'].'</td>';
             echo '<td>'.$donne['nomB'].'</td><td>'.$donne['nbh'].'</td>';
             echo '</tr>';    
            }
             echo'</tale>';   
            if(isset($_POST['intit']) && isset($_POST['code']) && isset($_POST['id']) && isset($_POST['cid']) && isset($_POST['year']))
            {   
                $d= $_GET['mid'];
                $sql1 = "UPDATE modules SET 
                intitule = :intitule,
                code = :code,
                eid= :eid,
                cid = :cid,
                annee = :annee
                WHERE mid='$d'";
                
                $reponse = $bdd->prepare($sql1);
                $reponse->execute(array(
                'intitule' =>$_POST['intit'],
                'code' =>  $_POST['code'],
                'eid' =>     $_POST['id'],
                'cid' =>     $_POST['cid'],
                'annee'=>$_POST['year']
                ));           
                header('Location: liste_module.php');
            }
    include("footer.php");
    ?>
            
            
            
            
            
            
            
            
            
            
        
       