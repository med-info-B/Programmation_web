<?php
    require("auth/EtreAuthentifie.php");
    require("db_config.php");
    $title = 'Suprimer un enseignant';
    include("header.php");
?>
    <?php
        if(isset($_GET['eid'])) {
            try 
            {
	           $bdd = new PDO($dsn, $username, $password);
            }
            catch(Exception $e)
            {
                die('Erreur : '.$e->getMessage());
            }
            }
            $donne=$_GET['eid'];
            $donne1=$_GET['etid'];
            $sql1 = "DELETE FROM etypes WHERE etid='$donne1'";
            $reponse1=$bdd->prepare($sql1);
            $reponse1->execute();
            $sql = ("DELETE FROM enseignants WHERE eid='$donne'");
            $reponse=$bdd->prepare($sql);
            $reponse->execute();
            header('Location: liste_prof.php');
    include("footer.php");
    ?>
    

