  <?php
    require("auth/EtreAuthentifie.php");
    require("db_config.php");
    $title = 'Ajouter un module';
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
                <td><input type="text" name="inti" class="form-control" id="inputint" placeholder="programmation web" required></td>
            </tr>
            <tr>
                <td><label for="inputc" class="control-label"> Code </label></td>
                <td><input type="text" name="code" class="form-control" id="inputpre" placeholder="XSXUBAD0" required ></td>
            </tr>
            <tr>
                <td><label for="inputid" class="control-label"> Id Enseignant Responsable </label></td>
                <td><input type="number" name="id" class="form-control" id="inputid" placeholder=" identitifiant pro" required></td>
            </tr>
            <tr>
                <td><label for="inputca" class="control-label"> Nom catégorie </label></td>
                <td><input type="text" name="cate" class="form-control" id="inputca" placeholder="Licence 2 info" required></td>
            </tr>
            <tr>
                <td><label for="inputy" class="control-label">Année</label></td>
                <td><input type="text" name="annee" class="form-control" id="inputtel" placeholder="exp :2019" required></td>
            </tr>
        </table>
            <div class="form-group">
                <button type="submit" class="btn btn-primary"> Ajouter </button>
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
            echo '<p class="center"><a href="liste_module.php"> Liste Des modules</a></p>';
       
            if(isset($_POST['inti']) && isset($_POST['code']) && isset($_POST['id']) && isset($_POST['cate']) && isset($_POST['annee']))
            {  
                $nom = $_POST['cate'];
                $sql1 = "INSERT INTO categories(nom) VALUE5(?)";
                $rep1 = $bdd->prepare($sql);
                $rep1->execute(array($nom));
              
                
                $sql2 = "SELECT MAX(cid) AS max FROM categories";
                $repo = $bdd->prepare($sql2);
                $repo->execute(array());
                $data = $repo->fetch();
                $ma=$data['max']; 
                 echo 'max'.$ma;
           
                $sql3 = "INSERT INTO modules(intitule,code,eid,cid,annee)
                VALUE(:intitule, :code, :eid, :cid, :annee)";
                $reponse2 = $bdd->prepare($sql3);
                $reponse2->execute(array(
                    'intitule' => $_POST['inti'],
                    'code' => $_POST['code'],
                    'eid' => $_POST['id'],
                    'cid' => $ma,
                    'annee' => $_POST['annee']
                    )) ;   
            }
    include("footer.php");
    ?>
            
            
            
            
            
            
            
            
            
            
        
       