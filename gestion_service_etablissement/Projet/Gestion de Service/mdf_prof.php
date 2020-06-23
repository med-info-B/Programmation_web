<?php

   require("auth/EtreAuthentifie.php");
    require("db_config.php");
    $title = 'modifier';
    include("header.php");
?>  
    <a href="<?= $pathFor['logout'] ?>" title="Logout">Dexonnexion</a><a href="home.php"><br/> Acceuil </a></br>
    <div class="center">
    <h1>Modifier un enseignant </h1>
        <?php 
           try
           {  
	        $bdd = new PDO($dsn, $username, $password);
           }
           catch(Exception $e)
           {
            die('Erreur : '.$e->getMessage());
           }
            $id = $_GET['etid'];
            $sql = "SELECT nom,nbh FROM etypes WHERE etid='$id'";
            $reponse=$bdd->prepare($sql);
            $reponse->execute(array());
            $donnee = $reponse->fetch();
        ?>
    <form method="POST">        
    <table>
        <tr>
            <td><label for="inputnom" class="control-label"> Nom </label></td>
            <td><input type="text" name="nom" class="form-control" id="inputnom" value=<?php echo $_GET['nom'];?>></td>
        </tr>
        <tr>
            <td><label for="inputpre" class="control-label">Prenom</label></td>
            <td><input type="text" name="prenom" class="form-control" id="inputpre"  value=<?php echo $_GET['prenom'];?>></td>
        </tr>
        <tr>
            <td><label for="inputem" class="control-label">E-mail</label></td>
            <td><input type="text" name="email" class="form-control" id="inputtem"  value=<?php echo $_GET['email'];?>></td>
        </tr>
        <tr>
            <td><label for="inputtel" class="control-label">N°:Tel</label></td>
        <td><input type="text" name="tel" class="form-control" id="inputtel"  value=<?php echo $_GET['tel'];?>></td>
        </tr>
        <tr>
            <td><label for="inputan" class="control-label"></label> Année </td>
            <td><input type="text" name="annee" class="form-control" id="inputtan"  value=<?php echo $_GET['annee'];?>></td>
        </tr>
        <tr>
            <td><label for="inputc" class="control-label"></label> Type de Contrat </td>
            <td><input type="text" name="contrat" class="form-control" id="inputc"  value=<?php echo $donnee['nom'];?>></td>
        </tr>
        <tr>
            <td><label for="inputh" class="control-label"></label> Nombre d'heure </td>
            <td><input type="text" name="nbh" class="form-control" id="inputh"  value=<?php echo $donnee['nbh'];?>></td>
        </tr>
    </table>
    <div class="form-group">
                <button type="submit" class="btn btn-primary">Modifier</button>
    </div>
    </form>
    </div> 
    <?php
        if(isset($_GET['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['tel']))
        {    
            $sql1 = "INERT INTO etypes(nom,nbh) VALUE(?,?) WHERE etid='$id'";
            $rep = $bdd->prepare($sql1);
            $rep->execute(array($donnee['nom'],$donnee['nbh']));            
            $donne=$_GET['eid']; 
            $sql="UPDATE enseignants SET 
            nom = :nom,
            prenom = :prenom,
            email= :email,
            tel = :tel,
            annee = :annee
            WHERE eid='$donne'";
            $reponse=$bdd->prepare($sql);
            $reponse->execute(array(
            'nom' =>   $_POST['nom'],
            'prenom' =>$_POST['prenom'],
            'email' => $_POST['email'],
            'tel' =>   $_POST['tel'],
            'annee' => $_POST['annee']
        ));
        header('Location: liste_prof.php');
        }    
  include("footer.php");            
?>








