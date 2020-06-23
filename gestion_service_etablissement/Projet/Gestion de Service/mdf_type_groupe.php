<?php
    require("auth/EtreAuthentifie.php");
    require("db_config.php");
    $title = 'Ajouter un type de groupe';
    include("header.php");
?>
    <a href="<?= $pathFor['logout'] ?>" title="Logout"> Deconnexion </a></br>
    <a href="home.php"> Acceuil </a>
    <div class="center">
    <h1> Ajouter un groupe </h1>
        <p class="center"> <a href="liste_groupe.php?a=2"> Liste des Type des Groupes </a> </p>
    <form method="POST">            
        <table>
            <tr>
                <td><label for="inputa" class="control-label"> Nom Type de Groupe </label></td>
                <td><input type="text" name="A" class="form-control" id="inputa" value=<?php echo $_GET['b'];?> /></td>
            </tr>
            <tr>
                <td><label for="inputb" class="control-label"> Nombre d'heure nécessaire </label></td>
                <td><input type="text" name="B" class="form-control" id="inputb" value= <?php echo $_GET['c'];?> /></td>
            </tr>
            <tr>
                <td><label for="inputc" class="control-label"> Coefficient </label></td>
                <td><input type="text" name="C" class="form-control" id="inputc" value= <?php echo $_GET['d'];?> /></td>
            </tr>
        </table>
            <div class="form-group">
                <button type="submit" class="btn btn-primary"> Modifier </button>
            </div>
    </form>
    </div>
    <?php
        if(isset($_POST['A']) && isset($_POST['B']) && isset($_POST['C']) && isset($_GET['a']))
         {    
            try
            {      
	           $bdd = new PDO($dsn, $username, $password);
            }
            catch(Exception $e)
            {
                die('Erreur : '.$e->getMessage());
            }  
       
            $donne = $_GET['a'];
            $sql3 = "UPDATE gtypes SET    
            nom=  :nom, 
            nbh=:nbh,
            coeff =:coeff
            WHERE gtid ='$donne'";
            $reponse2 = $bdd->prepare($sql3);
            $reponse2->execute(array(
            'nom' => $_POST['A'],
            'nbh' => $_POST['B'],
            'coeff' => $_POST['C']
         ));  
             header('Location: liste_typegroupe.php');
      }
    include("footer.php");        
?>            
            
            
            