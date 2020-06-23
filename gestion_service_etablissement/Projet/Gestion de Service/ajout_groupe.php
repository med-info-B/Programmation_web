<?php
    require("auth/EtreAuthentifie.php");
    require("db_config.php");
    $title = 'Ajouter un groupe';
    include("header.php");
?>
    <a href="<?= $pathFor['logout'] ?>" title="Logout"> Deconnexion </a></br>
    <a href="home.php"> Acceuil </a>
    <div class="center">
    <h1> Ajouter un groupe </h1>
        <p class="center"><a href="liste_module.php"> Liste Des Modules </a></p>
        <p class="center"> <a href="liste_groupe.php?a=2"> Liste des Groupes </a> </p>
    <form method="POST">            
        <table>
            <tr>
                <td><label for="inputmd" class="control-label"> Id module </label></td>
                <td><input type="text" name="A" class="form-control" id="inputmd" placeholder="Id module "required/></td>
            </tr>
            <tr>
                <td><label for="inputnom" class="control-label"> Nom du Groupe </label></td>
                <td><input type="text" name="B" class="form-control" id="inputnom" placeholder="TP,TD,CM" required /></td>
            </tr>
            <tr>
                <td><label for="inputan" class="control-label">Annee</label></td>
                <td><input type="text" name="C" class="form-control" id="inputan" placeholder="exp : 2019" required/></td>
            </tr>
            <tr>
                <td><label for="inputd" class="control-label">ID Type de Groupe </label></td>
                <td><input type="text" name="D" class="form-control" id="inputd" placeholder="Id groupe" required></td>
            </tr>
        </table>
            <div class="form-group">
                <button type="submit" class="btn btn-primary"> Ajouter </button>
            </div>
    </form>
    </div>
    <?php
        if(isset($_POST['A']) && isset($_POST['B']) && isset($_POST['C']) && isset($_POST['D']))
         {    
            try
            {      
	           $bdd = new PDO($dsn, $username, $password);
            }
            catch(Exception $e)
            {
                die('Erreur : '.$e->getMessage());
            }  
       
    
            $sql3 = "INSERT INTO groupes(mid,nom,annee,gtid)
            VALUE(:mid, :nom, :annee, :gtid)";
            $reponse2 = $bdd->prepare($sql3);
            $reponse2->execute(array(
            'mid' => $_POST['A'],
            'nom' => $_POST['B'],
            'annee' => $_POST['C'],
            'gtid' => $_POST['D']
         ));  
      }
    include("footer.php");        
?>
            
            
            
            
            
            
            
            
            
            
        
       