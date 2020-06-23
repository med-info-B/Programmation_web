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
                <td><input type="text" name="A" class="form-control" id="inputa" placeholder="CM programmation C "required/></td>
            </tr>
            <tr>
                <td><label for="inputb" class="control-label"> Nombre d'heure nécessaire </label></td>
                <td><input type="text" name="B" class="form-control" id="inputb" placeholder="23 " required /></td>
            </tr>
            <tr>
                <td><label for="inputc" class="control-label"> Coefficient </label></td>
                <td><input type="text" name="C" class="form-control" id="inputc" placeholder="1.4" required/></td>
            </tr>
        </table>
            <div class="form-group">
                <button type="submit" class="btn btn-primary"> Ajouter </button>
            </div>
    </form>
    </div>
    <?php
        if(isset($_POST['A']) && isset($_POST['B']) && isset($_POST['C']))
         {    
            try
            {      
	           $bdd = new PDO($dsn, $username, $password);
            }
            catch(Exception $e)
            {
                die('Erreur : '.$e->getMessage());
            }  
       
    
            $sql3 = "INSERT INTO gtypes(nom,nbh,coeff)
            VALUE(:nom, :nbh, :coeff)";
            $reponse2 = $bdd->prepare($sql3);
            $reponse2->execute(array(
            'nom' => $_POST['A'],
            'nbh' => $_POST['B'],
            'coeff' => $_POST['C']
         ));  
      }
    include("footer.php");        
?>
            
            
            
            
            
            
            
            
            
            
        
       