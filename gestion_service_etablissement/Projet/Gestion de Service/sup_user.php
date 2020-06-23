<?php
    require("auth/EtreAuthentifie.php");
    require("db_config.php");
    $title = 'Delete user';
    include("header.php");
?>  
    <?php
        if(isset($_GET['uid'])) {
        try 
        { 
	     $bdd = new PDO($dsn, $username, $passwords);
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }
        }
          $donne=$_GET['uid'];
          $sql = ("DELETE FROM users WHERE uid='$donne'");
          $reponse=$bdd->prepare($sql);
          $reponse->execute();
          header('Location: liste_user.php');
    include("footer.php");
    ?>
