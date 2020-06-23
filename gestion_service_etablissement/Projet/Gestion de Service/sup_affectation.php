<?php
    require("auth/EtreAuthentifie.php");
    require("db_config.php");
    $title = 'Sypprimer affectation';
    include("header.php");
?>  
    <?php
        if(isset($_GET['a']) && isset($_GET['b'])) {
        try 
        { 
	     $bdd = new PDO($dsn, $username, $passwords);
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }
        }
          $idA= $_GET['a']; // enseignant
          $idB = $_GET['b']; // groupe 
          $sql = ("DELETE FROM affectations WHERE eid='$idA' AND gid='$idB'");
          $reponse=$bdd->prepare($sql);
          $reponse->execute();
          header('Location: liste_affectation.php');
    include("footer.php");
    ?>
