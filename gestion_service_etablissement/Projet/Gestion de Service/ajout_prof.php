<?php
    require("auth/EtreAuthentifie.php");
    require("db_config.php");
    $title = 'Ajouter un enseignant';
    include("header.php");
?>
    <a href="<?= $pathFor['logout'] ?>" title="Logout"> Deconnexion </a></br>
    <a href="home.php"> Acceuil </a>
    <div class="center">
    <h1> Ajouter un Enseignant </h1>
    <p> Avant de Remplir le formulaire Créer d'abord un compte utilisateur pour lui</p>
        <a href="ajout_user.php?a=1"> Créer un compte utilisateur </a>
    <form method="POST">            
        <table>
            <tr>
                <td><label for="inputnom" class="control-label"> Nom </label></td>
                <td><input type="text" name="nom" class="form-control" id="inputnom" placeholder="exp : youssef "required/></td>
            </tr>
            <tr>
                <td><label for="inputpre" class="control-label"> Prenom </label></td>
                <td><input type="text" name="prenom" class="form-control" id="inputpre" placeholder="exp : Ahmed" required /></td>
            </tr>
            <tr>
                <td><label for="inputem" class="control-label">E-mail</label></td>
                <td><input type="email" name="email" class="form-control" id="inputem" placeholder="exemple@gmail.com" required/></td>
            </tr>
            <tr>
                <td><label for="inputtel" class="control-label">N°: Tel</label></td>
                <td><input type="tel" name="tele" class="form-control" id="inputtel" placeholder="exp :0753556677" required></td>
            </tr>
            <tr>
                <td><label for="inputan" class="control-label"> Année </label></td>
                <td><input type="text" name="annee" class="form-control" id="inputan" placeholder="exp :2019" required></td>
            </tr>
            <tr>
                <td><label for="inputc" class="control-label"> Type Contrat </label></td>
                <td><input type="text" name="contrat" class="form-control" id="inputc" placeholder="exp : Vac" required></td>
            </tr>
            <tr>
                <td><label for="inputh" class="control-label"> Nombre d'heure </label></td>
                <td><input type="text" name="nbh" class="form-control" id="inputh" placeholder="nbh à effectuer" required></td>
            </tr>
        </table>
            <div class="form-group">
                <button type="submit" class="btn btn-primary"> Ajouter </button>
            </div>
    </form>
    </div>
    <?php
        if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['tele']) && isset($_POST['annee']) && isset($_POST['nbh']))
         {    
            try
            {      
	           $bdd = new PDO($dsn, $username, $password);
            }
            catch(Exception $e)
            {
                die('Erreur : '.$e->getMessage());
                
            }  
        // Selectionner l id user compte libre 
            $sql3 = "SELECT uid FROM users WHERE role='user' AND uid NOT IN (SELECT uid FROM enseignants)";
            $rep = $bdd->prepare($sql3);
            $rep->execute(array());
            $donne3 = $rep->fetch();
            $id = $donne3['uid'];
            if(empty($id)) {
                echo 'Créer un compte utilisateur svp pour continuer';
                exit();
            }
            // Insertion les valeurs dans la table etypes
            $sql1 = "INSERT INTO etypes(nom,nbh) VALUE(?,?)";
            $rep = $bdd->prepare($sql1);
            $rep->execute(array($_POST['contrat'],$_POST['nbh']));       
        
            // Recupérer la clé de la table etypes
            $sql2 = "SELECT MAX(etid) FROM etypes";
            $repo = $bdd->prepare($sql2);
            $repo->execute(array());
            $donne2 = $repo->fetch();
            $max=$donne2['MAX(etid)'];          
            // insertion dans la enseignants
            $sql3 = "INSERT INTO enseignants(uid,nom,prenom,email,tel,etid,annee)
            VALUE(:uid, :nom, :prenom, :email, :tel, :etid, :annee)";
            $reponse2 = $bdd->prepare($sql3);
            $reponse2->execute(array(
            'uid' => $id,
            'nom' => $_POST['nom'],
            'prenom' => $_POST['prenom'],
            'email' => $_POST['email'],
            'tel' => $_POST['tele'],
            'etid' => $max,
            'annee' => $_POST['annee'] 
         ));
          header('Location: enseignant.php');    
      }
    include("footer.php");        
    ?>
            
            
            
            
            
            
            
            
            
            
        
       