<?php

require("auth/EtreAuthentifie.php");
require("db_config.php");
$title = 'Modifier password user';
include("header.php");
?>  
    <a href="<?= $pathFor['logout'] ?>" title="Logout">Deconnexion</a><a href="home.php"><br/> Acceuil </a></br>
    <div class="center">
    <h1>Modifier mot pass </h1>
    <form method="POST">            
        <table>
            <tr>
                <td><label for="inputMDP" class="control-label">New MDP</label></td>
                <td><input type="password" name="mdp1" class="form-control" id="inputMDP" placeholder=" New Password" required/></td>
            </tr>
            <tr>
                <td><label for="inputMDP2" class="control-label">Répéter MDP</label></td>
                <td><input type="password" name="mdp2" class="form-control" id="inputMDP" placeholder="repeat Password" required/></td>
            </tr>
        </table>
        <div class="form-group">
                <button type="submit" class="btn btn-primary">Modifier</button>
        </div>
    </form>
    </div>
    <?php
    if(isset($_POST['mdp1']) && isset($_POST['mdp2']))
    {
        try
        {
	     $bdd = new PDO($dsn, $username, $password);
        }
        catch(Exception $e)
        {
         die('Erreur : '.$e->getMessage());
        }
        if($_POST['mdp1'] == $_POST['mdp2'])    
        {
         $donne= $idm->getUid();
         $s = $_POST['mdp1'];
         $pass_hash= password_hash($s, PASSWORD_DEFAULT);
         $sql="UPDATE users SET mdp=? WHERE uid='$donne'";
         $reponse=$bdd->prepare($sql);
         $reponse->execute(array($pass_hash));
         header('Location: user.php');
        }    
        else
        {
         echo '<p style="text-align: center;"> Erreur : les deux mots de passe c est pas les même<br/> Répéter svp  à nouveau !</p>';
        }
     }
            
    include("footer.php");               
    ?>







