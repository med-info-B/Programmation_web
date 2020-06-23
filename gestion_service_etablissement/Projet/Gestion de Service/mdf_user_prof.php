<?php
    require("auth/EtreAuthentifie.php");
    require("db_config.php");
    $title = 'Modifier user compte de prof';
    include("header.php");
?>   
    <a href="<?= $pathFor['logout'] ?>" title="Logout">Dexonnexion</a><a href="home.php"><br/> Acceuil </a></br>
    <div class="center">
    <h1>Modifier Compte utilisateur d'un enseignant </h1>
    <form method="POST">            
        <table>
            <tr>
                <td><label for="inputlogin" class="control-label">login</label></td>
                <td><input type="text" name="login" class="form-control" id="inputlogin" value=<?php echo $_GET['login'];?>></td>           
            </tr>        
            <tr>
                <td><label for="inputMDP" class="control-label">New MDP</label></td>
                <td><input type="password" name="mdp1" class="form-control" id="inputMDP" placeholder=" New Password" required /></td>
            </tr>
            <tr>
                <td><label for="inputMDP2" class="control-label">Répéter MDP</label></td>
                <td><input type="password" name="mdp2" class="form-control" id="inputMDP" placeholder="repeat Password" required /></td>
            </tr>
            <tr>
                <td><label for="inputrole" class="control-label">Role</label></td>
                <td><input type="text" name="role" class="form-control" id="inputrole" ="role"  value=<?php echo $_GET['role'];?>></td>
            </tr>
        </table>
    <div class="form-group">
                <button type="submit" class="btn btn-primary">Modifier</button>
    </div>
    </form>
    </div>
    <?php
    if(isset($_POST['mdp1']) && isset($_GET['uid']) && isset($_POST['mdp2']) && isset($_POST['login']) && isset($_POST['role']))
    {     
        try
        {            
	       $bdd = new PDO($dsn, $username, $password);
        }
        catch(Exception $e)
        {
        die('Erreur : '.$e->getMessage());
        }
        $SQL = "SELECT uid FROM users WHERE login=?";
        $stmt = $bdd->prepare($SQL);
        $res = $stmt->execute([$_POST['login']]);     
        if ($res && $stmt->fetch()) {
            echo '<p class="center">Login déjà utilisé</p>';
            exit();
        }

        if ($_POST['mdp1'] != $_POST['mdp2']) {
            echo '<p class="center">MDP 2 ne correspondent pas au premier';
            exit();
        }
        $donne=$_GET['uid']; 
        $sql="UPDATE users SET login=?,mdp=?,role=? WHERE uid='$donne'";
        $reponse=$bdd->prepare($sql);
        $reponse->execute(array($_POST['login'],$_POST['mdp1'],$_POST['role']));
        header('Location: user_prof_update.php');
    }
     include("footer.php");
    ?>







