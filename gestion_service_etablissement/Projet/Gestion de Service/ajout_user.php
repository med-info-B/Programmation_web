<?php
    require("auth/EtreAuthentifie.php");
    require("db_config.php");
    $title = 'Add user';
    include("header.php");
?>
        <a href="<?= $pathFor['logout'] ?>" title="Logout"> Deconnexion </a></br>
        <a href="home.php"> Acceuil </a>
        <div class="center">
        <h1> Ajouter un Utilisateur </h1>
            <?php
               if($_GET['a'] == 1)
             {
                 echo '<a href="ajout_prof.php"> Ajoute un enseignant </a>';
             }
           ?>
        <form method="POST">        
            <table>
                    <tr>
                         <td><label for="inputlogin" class="control-label">Login</label></td>
                         <td><input type="text" name="login" class="form-control" id="inputlogin" placeholder="Entrer un login" required/>
                         </td>
                    </tr>        
                    <tr>
                        <td><label for="inputMDP" class="control-label"> MDP</label></td>
                        <td><input type="password" name="mdp1" class="form-control" id="inputMDP" placeholder=" New Password" required /></td>
                    </tr>
                    <tr>
                        <td><label for="inputMDP2" class="control-label">Répéter MDP</label></td>
                        <td><input type="password" name="mdp2" class="form-control" id="inputMDP" placeholder="repeat Password" required/></td>
                    </tr>
                    <tr>
                        <td><label for="inputrole" class="control-label">Role</label></td>
                        <td><input type="text" name="role" class="form-control" id="inputrole" placeholder="user/admoin" required></td>
                    </tr>
           </table>
           <div class="form-group">
                    <button type="submit" class="btn btn-primary"> Ajouter </button>
           </div>
        </form>
        </div>
        <?php 
            $error = "";
            if(isset($_POST['login']) && isset($_POST['mdp1']) && isset($_POST['role']) && isset($_POST['mdp2'])) 
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
                $stmt = $db->prepare($SQL);
                $res = $stmt->execute([$_POST['login']]);
                
                if ($res && $stmt->fetch()) {
                    echo '<p class="center">Login déjà utilisé</p>';
                    exit();
                }

                if ($_POST['mdp1'] != $_POST['mdp2']) {
                    echo '<p class="center">MDP 2 ne correspondent pas au premier ';
                    exit();
                }    
                    $s = $_POST['mdp1'];
                    $pass_hash= password_hash($s, PASSWORD_DEFAULT);
                    $sql="INSERT INTO users(login,mdp,role) VALUE(?,?,?)";
                    $reponse = $bdd->prepare($sql);
                    $reponse->execute(array($_POST['login'],$pass_hash,$_POST['role']));
                    if($_GET['a'] == 1) {
                         header('Location: ajout_prof.php');
                    }
                
             }
             
    include("footer.php");
   ?>
        