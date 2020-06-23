<?php
   require("auth/EtreAuthentifie.php");
    require("db_config.php");
    $title = 'modifier un groupe';
    include("header.php");
?>  
    <a href="<?= $pathFor['logout'] ?>" title="Logout">Dexonnexion</a><a href="home.php"><br/> Acceuil </a></br>
    <p class="center"><a href="liste_module.php"> Liste Des Modules </a></p>
    <div class="center">
    <h1>Modifier l'affectation d'un groupe à un module </h1>
    <form method="POST">        
    <table>
        <tr>
            <td><label for="inputmid" class="control-label"> ID Module </label></td>
            <td><input type="text" name="A" class="form-control" id="inputmid" value=<?php echo $_GET['b'];?> required ></td>
        </tr>
        <tr>
            <td><label for="inputn" class="control-label">Nom Groupe </label></td>
            <td><input type="text" name="B" class="form-control" id="inputn"  value=<?php echo $_GET['c'];?>  required></td>
        </tr>
        <tr>
            <td><label for="inputa" class="control-label"> Annee </label></td>
            <td><input type="text" name="C" class="form-control" id="inputa"  value=<?php echo $_GET['d'];?> required></td>
        </tr>
        <tr>
            <td><label for="inputp" class="control-label">ID type de groupe </label></td>
            <td><input type="text" name="D" class="form-control" id="inputp"  value=<?php echo $_GET['e'];?> required></td>
        </tr>
        <tr>
                <td><label for="inputint" class="control-label"> Intitulé </label></td>
                <td><input type="text" name="E" class="form-control" id="inputint" value=<?php echo $_GET['f'];?>></td>
        </tr>
    </table>
               <div class="form-group">
                <button type="submit" class="btn btn-primary">Modifier</button>
    </div>
    </form>
    </div> 
        
    <?php
        if(isset($_POST['A']) && isset($_POST['B']) && isset($_POST['C']) && isset($_POST['D']) && isset($_POST['E']))            
        {      
           try
           {  
	        $bdd = new PDO($dsn, $username, $password);
           }
           catch(Exception $e)
           {
            die('Erreur : '.$e->getMessage());
           }
            $data=$_GET['a']; 
            $sql="UPDATE groupes SET 
            mid = :mid,
            nom = :nom,
            annee= :annee,
            gtid = :gtid
            WHERE gid='$data'";
            $reponse=$bdd->prepare($sql);
            $reponse->execute(array(
            'mid' =>   $_POST['A'],
            'nom' =>   $_POST['B'],
            'annee' =>  $_POST['C'],
            'gtid' =>   $_POST['D']
            ));
            header('Location: liste_groupe.php');
       }    
  include("footer.php");            
?>








